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

      public function getAll($limit = 0, $offset = 0){
         $this->db->select('*');
         $this->db->from('article');
         $this->db->join('ref_category', 'article.arCategory = ref_category.catId');
         $this->db->join('admin', 'article.arAuthor = admin.amId');
         $this->db->order_by('arId', 'desc');
         if ($limit > 0) $this->db->limit($limit, $offset);

         return $this->db->get()->result();
      }

      public function countAll() {
         return $this->db->get('article' )->num_rows();
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

      public function getByURL($url) {
         $this->db->select('*');
         $this->db->from('article');
         $this->db->join('ref_category', 'article.arCategory = ref_category.catId');
         $this->db->join('ref_map', 'ref_map.mapArticleId = article.arId');
         $this->db->join('ref_social_media', 'ref_social_media.smArticleId = article.arId');
         $this->db->join('admin', 'article.arAuthor = admin.amId');
         $this->db->where(array(
            'arURL' => $url
         ));

         return $this->db->get()->row();
      }

      public function getByCategory($idcategory, $limit = 0, $offset = 0) {
         $this->db->select('*');
         $this->db->from('article');
         $this->db->join('ref_category', 'article.arCategory = ref_category.catId');
         $this->db->join('admin', 'article.arAuthor = admin.amId');
         $this->db->order_by("arId", "DESC");
         $this->db->where(array(
            'catId' => $idcategory ,
            'arStatus' => 1
         ));
         if ($limit > 0) $this->db->limit($limit, $offset);

         return $this->db->get()->result();
      }

      public function countByCategory($category){
         return $this->db->get_where('article', array('arCategory' => $category))->num_rows();
      }

      public function getByYearMonthAndCategory($year, $month, $idcategory) {
         $month = (strlen($month) == 1) ? '0'.$month : $month;

         $query = $this->db->query("
            SELECT * FROM article INNER JOIN ref_category ON article.arCategory = ref_category.catId INNER JOIN admin ON article.arAuthor = admin.amId WHERE catId = '" . $idcategory . "' AND arStatus = '1' AND (arDateStart LIKE '%" . $year . '-' . $month . "%' OR arDateEnd LIKE '%" . $year . '-' .$month . "%' ) ORDER BY arId DESC
         ");

         $article = $query->result();

         $totalDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
         $result = array();
         for ($i=1; $i <= $totalDays; $i++) {
            $today = array();
            $days = ($i < 10) ? '0'.$i : $i;
            $date = $year.'-'.$month.'-'.$days;
            foreach ($article as $data) {
               if ( $date >= $data->arDateStart && $date <= $data->arDateEnd ) array_push($today, $data);
            }

            $result[$days] = $today;
         }

         return $result;
      }

      public function getRelatedByTag($idarticle){
         $query = $this->db->query("
            SELECT et.arTitle, et.arPict, et.arURL , ref_category.catName, at1.etArticleId, Count(at1.etName) AS common_tag_count
            FROM events_tags AS at1 INNER JOIN events_tags AS at2 ON at1.etName = at2.etName INNER JOIN article as et ON at1.etArticleId = et.arId INNER JOIN ref_category ON et.arCategory = ref_category.catId
            WHERE at2.etArticleId = '". $idarticle . "'
            GROUP BY at1.etArticleId
            HAVING at1.etArticleId != '". $idarticle . "'
            ORDER BY Count(at1.etName) DESC
         ");

         return $query->result();
      }

      public function search($keyword){
         $keyword = explode(' ',$keyword);

         $this->db->select('*');
         $this->db->from('article');
         $this->db->join('ref_category', 'article.arCategory = ref_category.catId');
         $this->db->join('ref_map', 'ref_map.mapArticleId = article.arId');
         $this->db->join('ref_social_media', 'ref_social_media.smArticleId = article.arId');
         $this->db->join('admin', 'article.arAuthor = admin.amId');
         $this->db->where(array(
            'arStatus' => '1'
         ));

         $i = 0;
         foreach ($keyword as $val) {
            if ($i == 0) $this->db->like('arTitle', $val);
            else $this->db->or_like('arTitle',$val);

            $this->db->or_like('catName',$val);
         }
         $this->db->order_by('arDateStart', 'desc');

         return $this->db->get()->result();
      }

      public function getPopular(){
         $dateNow = date('Y-m-d');
         $query = $this->db->query("
            SELECT article.arId, article.arTitle, ref_category.catName, article.arPict, SUM(hit_article.haTotal) AS TotalHit
            FROM hit_article INNER JOIN article ON article.arId = hit_article.haArticleId INNER JOIN ref_category ON ref_category.catId = article.arCategory
            WHERE article.arDateStart >= '" . $dateNow . "'
            GROUP BY hit_article.haArticleId
            ORDER BY TotalHit DESC
         ");

         return $query->result();
      }

   }
?>
