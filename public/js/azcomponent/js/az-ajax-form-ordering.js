(function() {
   var azformorder = Object.create(HTMLElement.prototype);

   azformorder.createdCallback = function () {
      var dragSrcEl = null
         , method = this.getAttribute('method');
      var divElm = this.querySelectorAll("div[od-iddata]");

      this.URLsuccess = this.getAttribute('success');
      this.URLtarget = this.getAttribute('action');
      this.CallbackType = this.getAttribute('callback-type') || 'modal-box';
      this.loadingBox = null;

      var main = this;

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

      this.getValPost = function () {
         var inputElm = ""
            , obj = [];

         var formData = new FormData();

         for (var i = 0; i < divElm.length; i++) {
            var id = divElm[i].getAttribute("od-iddata");
            var newOrderNum = i + 1;
            obj.push({ 'id': id, 'orderNum': newOrderNum});
         }

         formData.append('orderingValue' , JSON.stringify(obj));

         return formData;
      }

      this.scan = function () {
         [].forEach.call(divElm, function(col) {
            col.setAttribute('draggable', true);
            col.addEventListener('dragstart', main.handleDragStart , false);
            col.addEventListener('dragstart', main.handleDragStart, false);
            col.addEventListener('dragenter', main.handleDragEnter, false);
            col.addEventListener('dragover', main.handleDragOver, false);
            col.addEventListener('dragleave', main.handleDragLeave, false);
            col.addEventListener('drop', main.handleDrop, false);
            col.addEventListener('dragend', main.handleDragEnd, false);
         });
      }

      this.handleDragStart = function (e){
         this.style.opacity = '0.4';

         dragSrcEl = this;

         e.dataTransfer.effectAllowed = 'move';
         e.dataTransfer.setData('text/html', this.innerHTML);
         e.dataTransfer.setData('od-iddata', this.getAttribute('od-iddata'));
      }

      this.handleDragOver = function (e) {
         if (e.preventDefault) {
            e.preventDefault();
         }

         e.dataTransfer.dropEffect = 'move';

         return false;
      }

      this.handleDragEnter = function (e) {
         this.classList.add('over');
      }

      this.handleDragLeave = function (e) {
         this.classList.remove('over');
      }

      this.handleDrop = function (e) {
         var caList = [];

         if (e.stopPropagation) {
            e.stopPropagation();
         }

         if (dragSrcEl != this) {
            for (var i = 0; i < divElm.length; i++) {
               var id = divElm[i].getAttribute('od-iddata')
                  , content = divElm[i].innerHTML;
               caList.push({'id': id , 'content': content , 'elm': divElm[i]});
            }

            var sourceChange = false
               , targetChange = false;

            for (var i = 0; i < caList.length; i++) {
               if (caList[i].id === this.getAttribute('od-iddata') && !sourceChange) {

                  caList[i].elm.setAttribute('od-iddata', e.dataTransfer.getData('od-iddata'));
                  caList[i].elm.innerHTML = e.dataTransfer.getData('text/html');
                  sourceChange = true;

               } else if (caList[i].id === e.dataTransfer.getData('od-iddata') && (i-1) >= 0 && !targetChange && sourceChange) {

                  caList[i].elm.setAttribute('od-iddata', caList[i-1].id);
                  caList[i].elm.innerHTML = caList[i-1].content;
                  targetChange = true;

               } else if (caList[i].id === e.dataTransfer.getData('od-iddata') && (i+1) <= caList.length && !targetChange ) {

                  caList[i].elm.setAttribute('od-iddata', caList[i+1].id);
                  caList[i].elm.innerHTML = caList[i+1].content;
                  targetChange = true;

               } else if (sourceChange && !targetChange) {

                  caList[i].elm.setAttribute('od-iddata', caList[i-1].id);
                  caList[i].elm.innerHTML = caList[i-1].content;

               } else if (!sourceChange && targetChange) {

                  caList[i].elm.setAttribute('od-iddata', caList[i+1].id);
                  caList[i].elm.innerHTML = caList[i+1].content;

               }
            }
         }
         return false;
      }

      this.handleDragEnd = function (e) {
         [].forEach.call(divElm, function (col) {
            col.classList.remove('over');
            col.style.opacity = '1';
         });
      }

      this.onstart = function () {

      }

      this.onfinish = function () {

      }

      this.onsuccess = function ( response ){
         switch (this.CallbackType) {
            case 'modal-box':
               response = JSON.parse(response);
               var success = ( "success" in response) ? response.success : true
                  , delayTime = response.delayURL || 3000;

               if ( main.URLsuccess && success) {
                  var url = main.URLsuccess;

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
            default:
               createOverlay( response );
         }
      }

      this.onprogress = function ( evt ) {
         console.log(evt);
      }

      this.activateSubmit = function () {
         var ajax = new azajax(main);
         main.addEventListener('submit' , function (e) {
            ajax.post();

            if(e.preventDefault) e.preventDefault()
            else e.returnValue = false;
         });
      }
   }

   azformorder.attachedCallback = function() {
      this.activateSubmit();
      this.scan();
   }

   document.registerElement('az-formorder', {
      prototype: azformorder ,
      extends: 'form'
   });
})();
