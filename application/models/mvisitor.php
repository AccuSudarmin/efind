<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mvisitor extends CI_Model {

      public function getByDate($date) {
         $result = $this->db->get_where('visitor_total' , array('vtDate' => $date))->row();

         return $result;
      }

   }
?>
