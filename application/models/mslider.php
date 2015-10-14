<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mslider extends CI_Model {

      public function add($data) {
         $this->db->insert('slider', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function update($id, $data) {
         $this->db->update('slider', $data, "slId = " . $id);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function delete($id) {
         $this->db->delete('slider', array('slId' => $id));

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function getCurrentOrder() {
         $result = $this->db->count_all('slider') + 1;

         return $result;
      }

      public function getAll(){
         $this->db->select('*');
         $this->db->from('slider');
         $this->db->order_by("slOrder", "ASC");

         return $this->db->get()->result();
      }

      public function getById($id) {
         $data = $this->db->get_where('slider' , array('slId' => $id))->row();

         return $data;
      }

   }
?>
