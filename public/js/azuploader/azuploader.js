var ajax = function (obj) {
   this.post = function (target){
      var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {
         if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
            try {
               var response = JSON.parse(xmlhttp.responseText);
               obj.onsuccess( response );
            } catch (e) {
               console.log(e);
               console.log(xmlhttp.responseText);
            }
         }
      }

      xmlhttp.ontimeout = function () {
        console.log('Request Timeout');
      }

      xmlhttp.onabort = function () {
        console.log('Request Abort');
      }

      xmlhttp.onerror = function(e){
        console.log('Request Error');
      }

      xmlhttp.onprogress = function (evt) {
         var percentComplete = (evt.loaded / evt.total) * 100;
         obj.onprogress( percentComplete );
      }

      xmlhttp.open("POST", target , true);
      // xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send();
   }

   this.get = function (target) {
      var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function() {
         if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            try {
               var response = JSON.parse(xmlhttp.responseText);
               obj.onsuccess( response );
            } catch (e) {
               console.log(e);
               console.log(xmlhttp.responseText);
            }
         }
      }

      xmlhttp.onprogress = function (evt) {
         var percentComplete = (evt.loaded / evt.total) * 100;
         obj.onprogress(percentComplete);
      }

      xmlhttp.open("GET", target , true);
      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
      xmlhttp.send();
   }
}

function azuploader (setting) {
   var f = {};

   f.baseURL = setting.baseURL;
   f.backOverlay = null;
   f.divContent = null;

   f._id = function (id){
      return document.getElementById(id);
   }

   f.show = function () {
      if (f.backOverlay) f.backOverlay.parentNode.removeChild(f.backOverlay);

      f.backOverlay = document.createElement('div');
      f.divContent = document.createElement('div');

      var modalBox = document.createElement('div');
      var manager = document.createElement('div');

      modalBox.innerHTML = "<div class='azuploader-head'> File Manager </div> <div class='azuploader-navigation'> userfiles/ </div>";

      f.backOverlay.classList.add('azuploader-back-overlay');
      modalBox.classList.add('azuploader-modal-box');
      f.divContent.classList.add('azuploader-content');
      manager.classList.add('azuploader-manager');

      modalBox.appendChild(f.divContent);

      manager.innerHTML = "<input type='file'> <button type='button'>Upload</button>";
      modalBox.appendChild(manager);

      f.backOverlay.appendChild(modalBox);

      document.body.appendChild(f.backOverlay);

   }

   f.loadfolder = function(e) {
      f.divContent.innerHTML = '';

      var result = new Array();

      for (var i = 0; i < e.length; i++) {
         var newContainer = document.createElement('div');
         var crop = document.createElement('div');

         crop.classList.add('azuploader-crop');
         newContainer.classList.add('azuploader-container');

         newContainer.appendChild(crop);
         f.divContent.appendChild(newContainer);

         switch (e[i].type) {
            case 'image':
               // var radio = document.createElement('input');
               var span = document.createElement('span')
                  , img = document.createElement('img')
                  , aName = null
                  , aImage = null;

               if (setting.modul) {
                  for (var m = 0; m < setting.modul.length; m++) {
                     if (setting.modul[m].method && setting.modul[m].target) {
                        var spanMethod = document.createElement('span');
                        spanMethod.classList.add('azuploader-span-method');
                        if (setting.modul[m].method === 'getName') {
                           aName = document.createElement('a');
                           aName.innerHTML = 'Get Name';
                           spanMethod.appendChild(aName);
                           (function (i, m) {
                              aName.onclick = function () {
                                 document.getElementById(setting.modul[m].target).value = e[i].name;
                                 f.close();
                              }
                           }(i, m));
                        }
                        newContainer.appendChild(spanMethod);
                     }
                  }
               }

               img.src = e[i].loc;
               span.innerHTML

               // radio.type = 'radio';
               // radio.id = 'file' + i;
               // radio.name = 'azuploader';
               // radio.classList.add('azuploader-radio')
               // radio.style.display = 'none';
               //
               // newContainer.parentNode.insertBefore(radio, newContainer);

               crop.appendChild(img);
               break;
            case 'folder':
               result[i] = "<img src='" + f.baseURL + "/image/folder.jpg" + "'>";
               newContainer.classList.add('azuploader-folder');

               var span = document.createElement('span');
               span.classList.add('azuploader-title');
               span.innerHTML = e[i].name;

               (function (i) {
                  newContainer.addEventListener('click', function(){
                     f.ajax.get(f.baseURL + '/upload.php' + e[i].loc);
                  });
               }(i));

               crop.innerHTML =result[i];
               newContainer.appendChild(span);
               break;
            default:
               result[i] = document.createElement('span');
               result[i].innerHTML = e[i].name;
               crop.appendChild(result[i]);
         }
      }
   }

   f.on = function(){
      if (setting.button) {
         f._id(setting.button).addEventListener("click", function(e){
            f.show();
            f.ajax = new ajax(f);
            f.ajax.get(f.baseURL+'/upload.php');
         });
      }
   }

   f.close = function(){
      f.backOverlay.parentNode.removeChild(f.backOverlay);
   }

   f.request = function() {

   }

   f.onprogress = function(e) {
      console.log(e);
   }

   f.onsuccess = function(e){
      f.loadfolder(e);
   }

   return f;
}
