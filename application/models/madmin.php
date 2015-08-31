<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Madmin extends CI_Model {

      public function getByName($data) {
         $result = $this->db->get_where('admin' , array('amName' => $name))->row();

         return $result;
      }

   }
?>
