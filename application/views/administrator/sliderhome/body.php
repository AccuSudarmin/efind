<section class="main has-sidebar">
   <div class="page-title">
      <div class="title">
         <div class="middle">
            <h2> <?php echo $pagetitle; ?> </h2>
         </div>
      </div>
   </div>
   <div class="content">
      <div class="container">
         <table class="table-content">
            <tr>
               <th> No </th>
               <th> Title </th>
               <th> Description </th>
               <th> Picture </th>
               <th> Action </th>
            </tr>
            <?php  $i = 1; foreach ($sliderhome as $data): ?>
               <tr>
                  <td> <?php echo $i; ?> </td>
                  <td> <?php echo $data->shTitle; ?> </td>
                  <td> <?php echo $data->shDesc; ?> </td>
                  <td> <?php echo $data->shPict; ?> </td>
                  <td>
                     <button type="button" onclick="location.href='<?php echo $urledit . '/' . $data->shId  ?>';" class='button-default'/>
                        <i class="fa fa-pencil"></i>
                     </button>
                  </td>
               </tr>
            <?php $i++; endforeach; ?>
         </table>
      </div>
   </div>
</section>
