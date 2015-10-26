<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Msubmission extends CI_Model {

      public function add($data) {
         $this->db->insert('submission_event', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function delete($id) {
         $this->db->delete('submission_event', array('seId' => $id));

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function update($id, $data) {
         $this->db->update('submission_event', $data, "seId = " . $id);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function getAll(){
         $this->db->select('*');
         $this->db->from('submission_event');
         $this->db->join('ref_category', 'submission_event.seCategory = ref_category.catId');

         return $this->db->get()->result();
      }

      public function getById($id) {
         $this->db->select('*');
         $this->db->from('submission_event');
         $this->db->join('ref_category', 'submission_event.seCategory = ref_category.catId');
         $this->db->where( array(
            'seId' => $id
         ));

         return $this->db->get()->row();
      }

   }
?>
