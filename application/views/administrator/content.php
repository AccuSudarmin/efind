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
         <span class="button-manager-ic">
            <a href="<?php echo $urladd; ?>"> <i class="fa fa-plus"></i> </a>
         </span>
         <span class="button-manager-ic">
            <i class="fa fa-trash-o"></i>
         </span>
         <span id="totalSelected" class="select-description">
         </span>
      </div>
      <div class="float-right sorting-manager">
         <span class="active"> Name </span>
         <span> Date </span>
      </div>
   </div>
<div class="content">
      <div class="container">
         <table class="table-content">
            <tr>
               <th> No </th>
               <th> Title </th>
               <th> Category </th>
               <th> Date </th>
               <th> Posted By </th>
               <th> Action </th>
            </tr>
            <?php for ($i=1; $i <= 10; $i++): ?>
               <tr>
                  <td> <?php echo $i; ?> </td>
                  <td> Lorem ipsum dolor sit amet </td>
                  <td> Lorem ipsum dolor sit amet </td>
                  <td> 12 January 2015 </td>
                  <td> Lorem Ipsum </td>
                  <td> <span class="edit-icon image-center button-default"></span> <span class="delete-icon image-center button-danger"> </td>
               </tr>
            <?php endfor; ?>
         </table>
   </div>
</section>
