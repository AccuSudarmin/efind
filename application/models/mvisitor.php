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
         
         $result = $this->db->query("INSERT IGNORE INTO visitor_today VALUES('" . $ip . "','" . $date . "')");
      }

   }
?>
