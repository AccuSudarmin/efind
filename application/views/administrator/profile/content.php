<article id="main">
   <div class="container-header-page">
      <div class="title-page">PROFILE</div>
      <div class="welcoming">Content Manager</div>
   </div>

   <div class="container960">
      <table border="1" class="table-class">
         <tr>
            <th> No </th>
            <th> Judul </th>
            <th> Action </th>
         </tr>
         <?php $i = 1; foreach($profile as $data): ?>
            <tr>
               <td> <?php echo $i; ?> </td>
               <td> <?php echo $data['pfTitle']; ?> </td>
               <td>
                  <a href="<?php echo site_url('/admin/profile/edit/' . $data['pfId']) ?>"> Edit </a>
               </td>
            </tr>
         <?php $i++; endforeach; ?>
      </table>
   </div>
</article>
