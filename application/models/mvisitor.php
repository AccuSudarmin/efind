<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mvisitor extends CI_Model {

      public function getByDate($date) {
         $result = $this->db->get_where('visitor_total' , array('vtDate' => $date))->row();

         return $result;
      }

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

      public function joiningVisitor($startDate, $endDate) {
         $this->db->trans_begin();

         $this->db->query("
            INSERT INTO visitor_total(vtDate, vtTotal)
            SELECT vtdDate, COUNT(*) AS total
            FROM visitor_today
            WHERE vtdDate >= '" . $startDate . "' AND vtdDate <= '" . $endDate . "'
            GROUP BY vtdDate
            ON DUPLICATE KEY UPDATE vtTotal=vtTotal+1
            ");

         $this->db->query("
            DELETE INTO visitor_total
            WHERE vtdDate >= '" . $startDate . "' AND vtdDate <= '" . $endDate . "'
            ");

         if ( !$this->db->trans_status() ) {
            $this->db->trans_rollback();
            return false;
         } else {
            $this->db->trans_commit();
            return true;
         }
      }

   }
?>
