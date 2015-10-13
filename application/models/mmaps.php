<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mmaps extends CI_Model {

      public function add($data) {
         $this->db->insert('ref_map', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

   }
?>
