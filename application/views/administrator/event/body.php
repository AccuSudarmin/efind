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
         <span> All </span>
         <span class="active"> Exhibition </span>
         <span> Sport </span>
         <span> Music </span>
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
                     <button type="button" onclick="location.href='<?php echo site_url('admin/event/edit/' . $data->arId)  ?>';" class='button-default'/>
                        <i class="fa fa-pencil"></i>
                     </button>
                     <button type="button" onclick="location.href='<?php echo site_url('admin/event/delete/' . $data->arId)  ?>';" class='button-danger'/>
                        <i class="fa fa-trash-o"></i>
                     </button>
                  </td>
               </tr>
            <?php $i++; endforeach; ?>
         </table>
   </div>
</section>
