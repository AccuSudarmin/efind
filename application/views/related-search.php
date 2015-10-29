<div class="related-search">
   <h2> RELATED POSTS </h2>

   <?php
   foreach ($relatedEvent as $datarelated){
      echo "
         <div class='related-box'>
            <h5> <a href='" . site_url('/' . strtolower($datarelated->catName) . '/' . $datarelated->arURL) . "' target='_blank'> " . $datarelated->arTitle . "</a> </h5>";

      if (!empty($datarelated->arPict)) echo "<img src='" . $datarelated->arPict . "'>";

      echo "</div>";
   }
   ?>
</div>
