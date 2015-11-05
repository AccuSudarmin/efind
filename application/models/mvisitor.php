<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mvisitor extends CI_Model {

      public function increaseVisitorToday(){
         $date = date('Y-m-d');

         if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
             $ip = $_SERVER['HTTP_CLIENT_IP'];
         } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
             $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
         } else {
             $ip = $_SERVER['REMOTE_ADDR'];
         }

         // $result = $this->db->query("INSERT IGNORE INTO visitor_today VALUES('" . $ip . "','" . $date . "')");
         $result = $this->db->query("
            INSERT INTO visitor_today (vtdIp, vtdDate)
            SELECT * FROM (SELECT '" . $ip . "', '" . $date . "') AS tmp
            WHERE NOT EXISTS (
            SELECT vtdIp, vtdDate FROM visitor_today WHERE vtdIp = '" . $ip . "' AND vtdDate = '" . $date . "'
            ) LIMIT 1
            ");
      }

      public function joiningAll() {
         $today = date('Y-m-d');
         $this->db->trans_begin();

         $this->db->query("
            INSERT INTO visitor_total(vtDate, vtTotal)
            SELECT vtdDate, COUNT(*) AS total
            FROM visitor_today
            WHERE vtdDate != '" . $today . "'
            GROUP BY vtdDate
            ON DUPLICATE KEY UPDATE vtTotal=vtTotal+1
            ");

         $this->db->query("DELETE FROM visitor_total WHERE vtDate != '" . $today . "'");

         if ( !$this->db->trans_status() ) {
            $this->db->trans_rollback();
            return false;
         } else {
            $this->db->trans_commit();
            return true;
         }
      }

      public function getByDate($start = null, $end = null) {
         $this->db->trans_begin();

         if ($start != null && $end != null) {
            $query = $this->db->query("
               SELECT vtDate, vtTotal
               FROM visitor_total
               WHERE vtDate >= '" . $start . "' AND vtDate <= '" . $end . "'
               ");

            $result = $query->result();
         } else {
            $query = $this->db->query("
               SELECT vtdDate, COUNT(*) AS total
               FROM visitor_today
               WHERE vtdDate = '" . $start . "'
               GROUP BY vtdDate
               ");
            $result = $query->row();
         }

         if ( !$this->db->trans_status() ) {
            $this->db->trans_rollback();
            return false;
         } else {
            $this->db->trans_commit();
            return $result;
         }
      }

   }
?>
