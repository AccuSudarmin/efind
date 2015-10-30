(function() {
   var azform = Object.create(HTMLFormElement.prototype);

   azform.createdCallback = function () {
      this.URLtarget = this.getAttribute("action") || null
      this.URLsuccess = this.getAttribute("success") || null;
      this.Method = this.getAttribute("method") || "POST";
      this.CallbackType = this.getAttribute("callback-type") || 'modal-box';
      this.loadingBox = null;

      this.getValPost = function () {
         var elem = this.elements
            , group = ""
            , inputElm = ""
            , groupList = {};

         var formData = new FormData();
         for (var i = 0; i < elem.length; i++) {
            var name = elem[i].name
               , group = elem[i].getAttribute("in-group") || false
               , adding = true;

            var value = null;

            if (elem[i].type == 'file') {
               for(var f = 0; f < elem[i].files.length; f++){
                  formData.append(name , elem[i].files[f]);
               }
            } else if (group){
               var obj = {};

               if(elem[i].type == 'checkbox' || elem[i].type == 'radio'){
                  if (elem[i].checked) {
                     value = elem[i].value;
                  } else {
                     adding = false;
                  }
               } else {
                  value = elem[i].value;
               }

               if(adding){
                  if (groupList.hasOwnProperty(group)) {
                     groupList[group][name] = value;
                  } else {
                     obj[name] = value;
                     groupList[group] = obj;
                  }
               }

            } else {
               if(elem[i].type == 'checkbox' || elem[i].type == 'radio'){
                  if (elem[i].checked) {
                     value = elem[i].value;
                  } else {
                     adding = false;
                  }
               } else {
                  value = elem[i].value;
               }
               if(adding){
                  formData.append( name , value );
               }
            }

            if (Object.keys(groupList).length > 0  && i === (elem.length - 1)) {
               formData.append( 'group' , JSON.stringify(groupList) );
            }

         }

         return formData;
      }

      var ElementBuild = function ( element , inner ){
         var elm = document.createElement( element.tag );

         if (element.hasOwnProperty("id")) elm.setAttribute("id", element.id);
         if (element.hasOwnProperty("class")) elm.setAttribute("class", element.class);

         if (inner) elm.innerHTML = inner;

         return elm;
      }

      var createOverlay = function ( text , delayTime ) {
         var overlay_child = ElementBuild({ "tag" : "div" , "class" : "hiccup-modal-box-inside" }, text)
            , overlay = ElementBuild({ "tag" : "div" , "class" : "hiccup-modal-box" });

         overlay.appendChild(overlay_child);

         document.body.insertBefore(overlay, document.body.firstChild);

         var closeElement = setTimeout( function () {
            overlay.parentNode.removeChild(overlay);
         }, delayTime);
      }

      var showLoadingBox = function ( text ) {
         var overlay_child = ElementBuild({ "tag" : "div" , "class" : "hiccup-modal-box-inside" }, text);

         this.loadingBox = ElementBuild({ "tag" : "div" , "class" : "hiccup-modal-box" });

         this.loadingBox.appendChild(overlay_child);

         document.body.insertBefore(this.loadingBox, document.body.firstChild);

      }

      var closeLoadingBox = function () {
         if (this.loadingBox) this.loadingBox.parentNode.removeChild(this.loadingBox);
      }


      this.onstart = function () {
         showLoadingBox('Please Wait');
      }

      this.onfinish = function () {
         closeLoadingBox();
      }

      this.onsuccess = function ( response ){
         switch (this.CallbackType) {
            case 'modal-box':
               response = JSON.parse(response);
               var success = ( "success" in response) ? response.success : true
                  , delayTime = response.delayURL || 3000;

               if ( this.URLsuccess && success) {
                  var url = this.URLsuccess;

                  setTimeout( function () {
                     window.location.href = url;
                  }, delayTime);
               }
               createOverlay ( response.message , delayTime );
               break;
            case 'validation':
               break;
            case 'own-div':
               response = JSON.parse(response);
               _( response.targetDiv ).insertAdjacentHTML( 'afterend', response.message );
               break;
            case 'own-div-clear':
               response = JSON.parse(response);
               _( response.targetDiv ).innerHTML = response.message;
               break;
            default:
               createOverlay( response );
         }
      }

      this.onprogress = function ( evt ) {
         console.log(evt);
      }

      this.activateSubmit = function () {
         var ajax = new azajax(this);
         if (this.Method === "POST" || this.Method === 'post') {
            this.addEventListener('submit' , function (e) {
               ajax.post();

               if(e.preventDefault) e.preventDefault()
               else e.returnValue = false;
            });
         } else if (this.Method === "GET" || this.Method === 'get') {
            form.addEventListener('submit' , function (e) {
               ajax.get();

               if(e.preventDefault) e.preventDefault()
               else e.returnValue = false;
            });
         }
      }

   }

   azform.attachedCallback = function() {
      this.activateSubmit();
   }

   document.registerElement('az-form', {
      prototype: azform ,
      extends: 'form'
   });
})();
