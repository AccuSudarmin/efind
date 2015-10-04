<section class="main has-sidebar">
   <div class="page-title">
      <div class="">
         <div class="login-icon image-left title">
            <div class="middle">
               <h3> <?php echo $title; ?> </h3>
               <h6> <?php echo $subtitle; ?> </h6>
            </div>
         </div>
      </div>
      <div class="">

      </div>
   </div>
   <div class="content">
      <div class="container">
         <p>
            <input type="text" name="title">
         </p>
         <p>
            <textarea id='my_editor' name="content" rows="8" cols="40"></textarea>
         </p>
         <p>
            <select class="" name="category">
               <option value="0">Exhibition</option>
               <option value="1">Music</option>
               <option value="2">Sport</option>
            </select>
         </p>
         <p>
            <input type="date" name="datestart">
         </p>
         <p>
            <input type="date" name="dateend">
         </p>
      </div>
</section>
<script>
CKEDITOR.replace( 'my_editor',{
filebrowserBrowseUrl :'http://localhost/eventfinder/public/js/ckeditor/filemanager/browser/default/browser.html?Connector=http://localhost/eventfinder/public/js/ckeditor/filemanager/connectors/php/connector.php',
filebrowserImageBrowseUrl : 'http://localhost/eventfinder/public/js/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=http://localhost/eventfinder/public/js/ckeditor/filemanager/connectors/php/connector.php',
filebrowserFlashBrowseUrl :'http://localhost/eventfinder/public/js/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=http://localhost/eventfinder/public/js/ckeditor/filemanager/connectors/php/connector.php',
filebrowserUploadUrl  :'http://localhost/eventfinder/public/js/ckeditor/filemanager/connectors/php/upload.php?Type=File',
filebrowserImageUploadUrl : 'http://localhost/eventfinder/public/js/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
filebrowserFlashUploadUrl : 'http://localhost/eventfinder/public/js/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
});
</script>
