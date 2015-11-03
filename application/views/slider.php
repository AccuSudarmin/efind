<section class="slide-wrapper">
  <div class="slider">
   <script src="<?php echo base_url('public/js/slider.js');?>"></script>

   <div class="ninja-wrap">
      <section class="slider-cont">
         <?php foreach($slider as $data):?>
               <div class="slide" style="background: url('<?php echo $data->slPict; ?>') no-repeat; background-size: cover;
               background-position: 50% 50%;">
                 <div class="container">
                   <section class="row main-width">
                     <section class="slide-copy">
                        <article>
                       <h1><?php echo $data->slTitle ;?></h1>
                       <p><?php echo $data->slDesc;?>
                           <?php if(!empty($data->slURL)): ?>
                             <a href="<?php echo $data->slURL; ?>" target="_blank"> Read More </a>
                           <?php endif; ?>
                       </p>
                       </section>
                 </section>
                 </div>
               </div>
       <?php endforeach; ?>

      </section>
   </div>

    <div class="slider-nav main-width">
    <div class="slider-nav-wrapper">
      <ul class="slider-dots">
         <li><a href="#" class="arrow-prev"><i class="fa fa-angle-left"></i></a></li>
         <?php foreach($slider as $data):?>
            <li class="dot"><i class="fa fa-circle fa-1"></i></li>
         <?php endforeach; ?>
        <li> <a href="#" class="arrow-next"><i class="fa fa-angle-right"></i></a></li>
      </ul>
    </div>
    </div>
    </div>
</section>
