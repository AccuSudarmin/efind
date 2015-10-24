<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mwebprofile extends CI_Model {

      public function update($data) {
         $this->db->update('web_profile', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function getAll(){
         $this->db->select('*');
         $this->db->from('web_profile');

         return $this->db->get()->row();
      }

   }
?>
