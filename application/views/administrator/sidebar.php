<?php
   $dashboard = "";
   $event = "";
   $gallery = "";

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
         <a href="<?php echo site_url('/admin') ?>">Dashboard</a>
      </li>
      <li class="<?php echo $event;?>">
         <a href="<?php echo site_url('/admin/event') ?>">Event</a>
      </li>
      <li class="<?php echo $gallery;?>">
         <a href="<?php echo site_url('/admin/gallery') ?>">Gallery</a>
      </li>
      <li>
         <a href="#">Setting</a>
      </li>
   </ul>
</section>
