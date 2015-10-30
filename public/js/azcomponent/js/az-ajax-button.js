(function() {
   var azbuttonajax = Object.create(HTMLButtonElement.prototype);

   azbuttonajax.createdCallback = function () {
      this.URLtarget = this.getAttribute("action") || null
      this.URLsuccess = this.getAttribute("success") || null;
      this.Method = this.getAttribute("method") || "POST";
      this.CallbackType = this.getAttribute("callback-type") || 'dialog-box';
      this.loadingBox = null;

      this.getValPost = function () {

         var formData = new FormData();

         formData.append( this.name , this.value );

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
            case 'dialog-box':
               createDialogBox(response);
               break;
            default:
               createDialogBox(response);
         }
      }

      var createDialogBox = function ( msg ) {
         var dialogChild = ElementBuild({'tag' : 'div' , 'class' : 'hiccup-back-overlay-child'}, msg),
            dialog = ElementBuild({'tag' : 'div' , 'class' : 'hiccup-back-overlay'})
            buttonClose = ElementBuild({'tag' : 'div' , 'class' : 'back-overlay-close-button'}, '<i class="fa fa-times"> </i>');

         dialog.appendChild(buttonClose);
         dialog.appendChild(dialogChild);

         dialog.addEventListener('click', function(){
            this.parentNode.removeChild( this );
         });

         buttonClose.addEventListener('click', function(e) {
            dialog.parentNode.removeChild(dialog);

            e.stopPropagation();
         });

         dialogChild.addEventListener('click', function(e){
            e.stopPropagation();
         });

         document.body.appendChild( dialog );
      }

      this.onprogress = function ( evt ) {
         console.log(evt);
      }

      this.activateSubmit = function () {
         var ajax = new azajax(this);
         if (this.Method === "CLICK" || this.Method === 'click') {
            this.addEventListener('click' , function (e) {
               ajax.post();

               if(e.preventDefault) e.preventDefault()
               else e.returnValue = false;
            });
         }
      }

   }

   azbuttonajax.attachedCallback = function() {
      this.activateSubmit();
   }

   document.registerElement('az-buttonajax', {
      prototype: azbuttonajax ,
      extends: 'button'
   });
})();
