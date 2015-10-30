<section class="main has-sidebar">
   <div class="page-title">
      <div class="title">
         <div class="middle">
            <h2> Event </h2>
         </div>
      </div>
   </div>

   <div class="header-content-manager">
      <div class="button-manager">
         <span class="button-manager-ic" style="padding-left: 6px;">
            <a href="<?php echo $urladd; ?>"> <i class="fa fa-plus"></i> </a>
         </span>
      </div>
      <div class="float-right sorting-manager">
         <?php
            $all = ($activate == '0') ? 'active' : '';
            $music = ($activate == '1') ? 'active' : '';
            $exhibition = ($activate == '2') ? 'active' : '';
            $sport = ($activate == '3') ? 'active' : '';
         ?>
         <span class="<?php echo $all; ?>"> <a href='?'> All </a> </span>
         <span class="<?php echo $music; ?>"> <a href='?category=1'> Music </a> </span>
         <span class="<?php echo $exhibition; ?>"> <a href='?category=2'> Exhibition </a></span>
         <span class="<?php echo $sport; ?>"> <a href='?category=3'> Sport </a> </span>
      </div>
   </div>
<div class="content">
      <div class="container">
         <table class="table-content">
            <tr>
               <th> No </th>
               <th> Title </th>
               <th> Category </th>
               <th> Posted at </th>
               <th> Posted By </th>
               <th> Status </th>
               <th> Action </th>
            </tr>
            <?php  $i = 1; foreach ($event as $data): ?>
               <tr>
                  <td> <?php echo $i; ?> </td>
                  <td> <?php echo $data->arTitle; ?> </td>
                  <td> <?php echo $data->catName; ?> </td>
                  <td> <?php echo $data->arDatePost; ?> </td>
                  <td> <?php echo $data->amName; ?> </td>
                  <td>
                     <?php
                        if ($data->arStatus == 1) $status = 'Published';
                        else $status = "Draft";
                        echo $status;
                     ?>
                  </td>
                  <td>
                     <button type="button" onclick="location.href='<?php echo site_url('admin/event/edit/' . $data->arId)  ?>';" class='button-primary'/>
                        <i class="fa fa-pencil"></i>
                     </button>
                     <button type="button" onclick="if (!confirm('Are you sure delete this event?')) return; location.href='<?php echo site_url('admin/event/delete/' . $data->arId)  ?>';" class='button-danger'/>
                        <i class="fa fa-trash-o"></i>
                     </button>
                  </td>
               </tr>
            <?php $i++; endforeach; ?>
         </table>
            <div class="pagination">
               <?php echo $pagination; ?>
            </div>
   </div>
</section>
