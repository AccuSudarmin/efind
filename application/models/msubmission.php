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

      public function getAll($limit = 0, $offset = 0){
         $this->db->select('*');
         $this->db->from('submission_event');
         $this->db->join('ref_category', 'submission_event.seCategory = ref_category.catId');
         $this->db->order_by('seId', 'desc');
         if ($limit > 0) $this->db->limit($limit, $offset);

         return $this->db->get()->result();
      }

      public function countAll() {
         return $this->db->get('submission_event' )->num_rows();
      }

      public function getByCategory($idcategory, $limit = 0, $offset = 0) {
         $this->db->select('*');
         $this->db->from('submission_event');
         $this->db->join('ref_category', 'submission_event.seCategory = ref_category.catId');
         $this->db->order_by("seId", "DESC");
         $this->db->where(array(
            'catId' => $idcategory
         ));
         if ($limit > 0) $this->db->limit($limit, $offset);

         return $this->db->get()->result();
      }

      public function countByCategory($category){
         return $this->db->get_where('submission_event', array('seCategory' => $category))->num_rows();
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
