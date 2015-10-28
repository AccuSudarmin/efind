<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mfeaturedimage extends CI_Model {

      public function add($data) {
         $this->db->insert('slider_home', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function update($id, $data) {
         $this->db->update('slider_home', $data, "shId = " . $id);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      // public function delete($id) {
      //    $this->db->delete('slider_home', array('slId' => $id));
      //
      //    return ($this->db->affected_rows() != 1) ? false : true;
      // }
      //
      // public function getCurrentOrder() {
      //    $result = $this->db->count_all('slider_home') + 1;
      //
      //    return $result;
      // }

      public function getAll(){
         $this->db->select('*');
         $this->db->from('slider_home');

         return $this->db->get()->result();
      }

      public function getById($id) {
         $data = $this->db->get_where('slider_home' , array('shId' => $id))->row();

         return $data;
      }

   }
?>
