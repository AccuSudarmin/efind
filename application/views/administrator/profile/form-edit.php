<div id="main">
   <div class="container-header-page">
      <div class="title-page">Single Post Menu Manager</div>
   </div>

   <div class="container960">
      <div class="container960-child">
         <form
            fm-controller="editProfile"
            fm-target="<?php echo site_url('/admin/profile/update/' . $profile[0]['pfId']); ?>"
            fm-success="<?php echo site_url('/admin/profile/'); ?>"
            method="post"
            >
            <p>
               Title (ID): <br>
               <input type="text" class="input-element" name="title" value="<?php echo $profile[0]['pfTitle']; ?>" required>
            </p>
            <p>
               Description (ID): <br>
               <textarea name="desc" id="editor1"><?php echo $profile[0]['pfContent']; ?></textarea>
            </p>
            <input type="submit" class="right save-button" value="Update" name="update">
            <a href="<?php echo site_url('/admin/profile'); ?>">
               <div class="right cancel-button"> Cancel </div>
            </a>
         </form>
      </div>
   </div>
</div>
