<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Msocialmedia extends CI_Model {

      public function add($data) {
         $this->db->insert('ref_social_media', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function deleteByIdArticle($idarticle) {
         $this->db->delete('ref_social_media', array('smArticleId' => $idarticle));

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function updateByIdArticle($idarticle, $data) {
         $this->db->update('ref_social_media', $data, "smArticleId = " . $idarticle);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function getByIdArticle($idarticle) {
         $data = $this->db->get_where('ref_social_media' , array('smArticleId' => $idarticle))->row();

         return $data;
      }

   }
?>
