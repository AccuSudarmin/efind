<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Msocialmedia extends CI_Model {

      public function add($data) {
         $this->db->insert('ref_social_media', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

   }
?>
