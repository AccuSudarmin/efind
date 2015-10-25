<?php
   $dashboard = "";
   $event = "";
   $gallery = "";
   $slider = "";
   $sliderhome = "";
   $setting = "";

   switch ($activate) {
      case 'dashboard':
         $dashboard = "active";
         break;
      case 'event':
         $event = "active";
         break;
      case 'gallery':
         $gallery = "active";
         break;
      case 'slider':
         $slider = "active";
         break;
      case 'sliderhome':
         $sliderhome = "active";
         break;
      case 'setting':
         $setting = "active";
         break;
      default:
         $dashboard = "active";
         break;
   }
?>
<input type="checkbox" name="name" class="display-none" id="sidebarCheck">
<label for="sidebarCheck" class="sidebar-button">
   <div class="inside-sidebar-button relative block">
      <span class="line-button"></span>
   </div>
</label>

<section class="sidebar">
   <ul>
      <li class="<?php echo $dashboard;?>">
         <a href="<?php echo site_url('/admin') ?>"> <i class="fa fa-home"></i>&nbsp;&nbsp; Dashboard</a>
      </li>
      <li class="<?php echo $event;?>">
         <a href="<?php echo site_url('/admin/event') ?>"> <i class="fa fa-sticky-note"></i>&nbsp;&nbsp; Event</a>
      </li>
      <li class="<?php echo $gallery;?>">
         <a href="<?php echo site_url('/admin/gallery') ?>"> <i class="fa fa-picture-o"></i>&nbsp;&nbsp; Gallery</a>
      </li>
      <li class="<?php echo $slider;?>">
         <a href="<?php echo site_url('/admin/slider') ?>"> <i class="fa fa-object-ungroup"></i>&nbsp;&nbsp; Slider</a>
      </li>
      <li class="<?php echo $sliderhome;?>">
         <a href="<?php echo site_url('/admin/sliderhome') ?>"> <i class="fa fa-object-ungroup"></i>&nbsp;&nbsp; Slider Home</a>
      </li>
      <li class="<?php echo $setting;?>">
         <a href="<?php echo site_url('/admin/setting') ?>"> <i class="fa fa-cog"></i>&nbsp;&nbsp; Setting</a>
      </li>
   </ul>
</section>
