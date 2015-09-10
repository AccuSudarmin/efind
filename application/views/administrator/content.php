<section class="main has-sidebar">
<div class="page-title">
   <div class="login-icon image-left title">
      <div class="middle">
         <h3> Event </h3>
         <h6> content manager </h6>
      </div>
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
