<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Marticle extends CI_Model {

      public function add($data) {
         $this->db->insert('article', $data);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function update($id, $data) {
         $this->db->update('article', $data, "arId = " . $id);

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function delete($id) {
         $this->db->delete('article', array('arId' => $id));

         return ($this->db->affected_rows() != 1) ? false : true;
      }

      public function getAll(){
         $this->db->select('*');
         $this->db->from('article');
         $this->db->join('ref_category', 'article.arCategory = ref_category.catId');
         $this->db->join('admin', 'article.arAuthor = admin.amId');

         return $this->db->get()->result();;
      }

      public function getAvailableUrl($url) {
         $i = 1;
         $newUrl = $url;

         while ($this->db->get_where('article' , array('arURL' => $newUrl))->num_rows() > 0) {
            $newUrl = $url . $i;
            $i++;
         }

         return $newUrl;
      }

      public function getId($url) {
         $data = $this->db->get_where('article' , array('arURL' => $url))->row();

         return $data->arId;
      }

      public function getById($id) {
         $data = $this->db->get_where('article' , array('arId' => $id))->row();

         return $data;
      }

      public function getByCategory($idcategory) {
         $this->db->select('*');
         $this->db->from('article');
         $this->db->join('ref_category', 'article.arCategory = ref_category.catId');
         $this->db->join('admin', 'article.arAuthor = admin.amId');
         $this->db->order_by("arId", "DESC");
         $this->db->where(array(
            'catId' => $idcategory
         ));

         return $this->db->get()->result();
      }

   }
?>
