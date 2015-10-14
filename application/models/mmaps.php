<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mmaps extends CI_Model {

      public function add($data) {
         $this->db->insert('ref_map', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function deleteByIdArticle($idarticle) {
         $this->db->delete('ref_map', array('mapArticleId' => $idarticle));

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function updateByIdArticle($idarticle, $data) {
         $this->db->update('ref_map', $data, "mapArticleId = " . $idarticle);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function getByIdArticle($idarticle) {
         $data = $this->db->get_where('ref_map' , array('mapArticleId' => $idarticle))->row();

         return $data;
      }

   }
?>
