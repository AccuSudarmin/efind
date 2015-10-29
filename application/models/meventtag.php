<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Meventtag extends CI_Model {

      public function add($data) {
         $this->db->insert('events_tags', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function checkExist($name, $idarticle){
         $check = $this->db->get_where('events_tags' , array('etName' => $name , 'etArticleId' => $idarticle))->num_rows();

         return ($check > 0) ? true : false;
      }

      public function getByIdArticle($idarticle) {
         $data = $this->db->get_where('events_tags' , array('etArticleId' => $idarticle))->result();

         return $data;
      }

      public function deleteByIdArticle($idarticle) {
         $this->db->delete('events_tags', array('etArticleId' => $idarticle));

         return ($this->db->affected_rows() != 1) ? false : true;
      }

   }
?>
