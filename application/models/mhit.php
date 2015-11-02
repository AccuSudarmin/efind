<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Mhit extends CI_Model {

      public function increaseHit($date, $idarticle){
         $query = $this->db->query("INSERT INTO hit_article (haDate, haArticleId, haTotal) VALUES('". $date ."', '" . $idarticle . "', '1') ON DUPLICATE KEY UPDATE haTotal=haTotal+1");
      }

   }
?>
