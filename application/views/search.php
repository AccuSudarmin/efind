
<div class="main-width" style="overflow: hidden;">

   <div class="search-submission">
      <div class="search-button">
         <h3> Search Event</h3>
         <form action="" method="get">
            <input type="text" name="search" value="<?php echo $searchkeyword; ?>"> <i class="fa fa-search"> </i>
         </form>
      </div>

      <div class="result-bar">
         <?php if (!empty($event)): ?>
         <div class="div-head">
            <h3> Search Result </h3>
            <p> Found <?php echo count($event); ?> Results for "<?php echo $searchkeyword; ?>" </p>
         </div>
         <?php endif; ?>

         <?php foreach ($event as $data): ?>
         <div class="div-box">
            <h5> <?php echo $data->catName; ?> </h5><br>
            <h2> <?php echo $data->arTitle; ?> </h2>

            <?php if (!empty($data->arPict)): ?>
            <div class="div-img">
               <img src="<?php echo $data->arPict;?>">
            </div>
            <?php endif; ?>

            <div class="div-info">
               <?php echo $data->arMetaDesc; ?>
               <a href="<?php echo site_url(strtolower($data->catName) .'/'. $data->arURL); ?>" class="read-more"> Read More </a>
            </div>
         </div>
         <?php endforeach; ?>
   </div>

   <div class="aside-bar">
      <h2> POPULAR EVENTS </h2>

      <?php foreach ($popularEvent as $data): ?>
      <div class="aside-box">
         <h5> <?php echo $data->catName; ?> </h5><br>
         <h2> <a href="<?php echo site_url($data->catName . '/' . $data->arURL); ?>"> <?php echo $data->arTitle; ?> </a> </h2>
         <a href="<?php echo site_url($data->catName . '/' . $data->arURL); ?>"> <img src="<?php echo $data->arPict; ?>"> </a>
      </div>
      <?php endforeach; ?>

   </div>

   </div>

</div>
