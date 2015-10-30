<section class="main has-sidebar">
   <div class="page-title">
      <div class="title">
         <div class="middle">
            <h2> Event Submission</h2>
         </div>
      </div>
   </div>

   <div class="header-content-manager">
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
      <div class="container max-width">
         <table class="table-content">
            <tr>
               <th> No </th>
               <th> Title </th>
               <th> Category </th>
               <th> Organizer </th>
               <th> Contact </th>
               <th> Approval </th>
               <th> Action </th>
            </tr>
            <?php  $i = 1; foreach ($submission as $data): ?>
               <tr>
                  <td> <?php echo $i; ?> </td>
                  <td> <?php echo $data->seTitle; ?> </td>
                  <td> <?php echo $data->catName; ?> </td>
                  <td> <?php echo $data->seOrganizer; ?> </td>
                  <td> <?php echo $data->seContact; ?> </td>
                  <td>
                     <?php
                        if ($data->seApproval == '1') echo 'Yes';
                        else echo 'Not Yet';
                     ?>
                  </td>
                  <td>
                     <button
                        type="button"
                        is="az-buttonajax"
                        class='button-primary'
                        action='<?php echo site_url('admin/submission/view/' . $data->seId)  ?>'
                        method='click'
                        callback-type = 'dialog-box'
                        title="View"/>
                        <i class="fa fa-eye"></i>
                     </button>
                     <?php if ($data->seApproval != '1'): ?>
                        <button type="button" onclick="location.href='<?php echo site_url('admin/submission/submit/' . $data->seId)  ?>';" class='button-success' title="Approve"/>
                           <i class="fa fa-check"></i>
                        </button>
                     <?php endif ?>
                     <button type="button" onclick="if (!confirm('Are you sure delete this submission?')) return; location.href='<?php echo site_url('admin/submission/delete/' . $data->seId)  ?>';" class='button-danger' title="Delete"/>
                        <i class="fa fa-trash-o"></i>
                     </button>
                  </td>
               </tr>
            <?php $i++; endforeach; ?>
         </table>
   </div>
</section>
