<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mhit extends CI_Model {

      public function getByDate($date) {
         $result = $this->db->get_where('visitor_total' , array('vtDate' => $date))->row();

         return $result;
      }

      public function increaseVisitor($date){
         $query = $this->db->query("
            INSERT INTO visitor_today (vtdId, vtdDate, vtdTotal) VALUES(NULL, '". $date ."', '1') ON DUPLICATE KEY UPDATE vtdTotal=vtdTotal+1;
         ");
      }

   }
?>
