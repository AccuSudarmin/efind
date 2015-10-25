(function() {
   var _ = function (id) {
      return document.getElementById(id);
   }

   var azajax = function (obj) {
      this.post = function (){
         var xmlhttp = new XMLHttpRequest();

         xmlhttp.onreadystatechange = function() {
            switch (xmlhttp.readyState) {
               case 0:
                  // console.log('request not initialized ');
                  break;
               case 1:
                  // console.log('server connection established');
                  break;
               case 2:
                  // console.log('request recieved');
                  break;
               case 3:
                  // console.log('processing request');
                  break;
               case 4:
                  if (xmlhttp.status === 200) {
                     try {
                        var response = JSON.parse(xmlhttp.responseText);
                        obj.onsuccess( response );
                     } catch (e) {
                        console.log(e);
                        console.log(xmlhttp.responseText);
                     }
                  } else if (xmlhttp.status === 404) {
                     console.log('server not found');
                  }
                  break;
            }
         }

         xmlhttp.onloadstart = function() {
           obj.onstart();
         }

         xmlhttp.onloadend = function(){
            obj.onfinish();
         }

         xmlhttp.ontimeout = function () {
           console.log('Request Timeout');
           obj.onfinish();
         }

         xmlhttp.onabort = function () {
           console.log('Request Abort');
           obj.onfinish();
         }

         xmlhttp.onerror = function(e){
           console.log('Request Error');
           obj.onfinish();
         }

         xmlhttp.onprogress = function (evt) {
            var percentComplete = (evt.loaded / evt.total) * 100;
            obj.onprogress( percentComplete );
         }

         xmlhttp.open("POST", obj.URLtarget , true);
         // xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
         xmlhttp.send(obj.getValPost());
      }

      this.get = function () {
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

         xmlhttp.open("GET", obj.URLtarget , true);
         xmlhttp.send();
      }
   }

   var azform = Object.create(HTMLFormElement.prototype);

   azform.createdCallback = function () {
      this.URLtarget = this.getAttribute("action") || null
      this.URLsuccess = this.getAttribute("success") || null;
      this.Method = this.getAttribute("method") || "POST";
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
         var success = ( "success" in response) ? response.success : true
            , delayTime = response.delayURL || 3000;

         if ( this.URLsuccess && success) {
            var url = this.URLsuccess;

            setTimeout( function () {
               window.location.href = url;
            }, delayTime);
         }

         switch (response.type) {
            case 'modal-box':
               createOverlay ( response.message , delayTime );
               break;
            case 'validation':
               break;
            case 'own-div':
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

   var azformorder = Object.create(HTMLElement.prototype);

   azformorder.createdCallback = function () {
      var dragSrcEl = null
         , method = this.getAttribute('method');
      var divElm = this.querySelectorAll("div[od-iddata]");

      this.URLsuccess = this.getAttribute('success');
      this.URLtarget = this.getAttribute('action');
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
         var success = ( "success" in response) ? response.success : true
            , delayTime = response.delayURL || 3000;

         if ( main.URLsuccess && success) {
            var url = main.URLsuccess;

            setTimeout( function () {
               window.location.href = url;
            }, delayTime);
         }

         switch (response.type) {
            case 'modal-box':
               createOverlay ( response.message , delayTime );
               break;
            case 'validation':
               break;
            case 'own-div':
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
// var hiccupElementController = function (input) {
//    var h = {};
//
//    h.URLtarget = input.getAttribute("in-target") || null;
//    h.URLsuccess = input.getAttribute("in-success") || null;
//    h.offsetTop = input.offsetTop;
//    h.offsetLeft = input.offsetLeft;
//    h.offsetHeight = input.offsetHeight;
//    h.offsetWidth = input.offsetWidth;
//    h.group = input.getAttribute("in-group") || null;
//    h.method = input.getAttribute("in-method") || null;
//    h.suggestBox = null;
//    h.ajax = new hiccupAjax(h);
//    h.myVar = null;
//
//    input.autocomplete = "off";
//
//    var ElementBuild = function ( element , inner ){
//       var elm = document.createElement( element.tag );
//
//       if (element.hasOwnProperty("id")) elm.setAttribute("id", element.id);
//       if (element.hasOwnProperty("class")) elm.setAttribute("class", element.class);
//
//       if (inner) elm.innerHTML = inner;
//
//       return elm;
//    }
//
//    var createOverlay = function ( text , delayTime ) {
//       var overlay_child = ElementBuild({ "tag" : "div" , "class" : "hiccup-modal-box-inside" }, text)
//          , overlay = ElementBuild({ "tag" : "div" , "class" : "hiccup-modal-box" });
//
//       overlay.appendChild(overlay_child);
//
//       document.body.insertBefore(overlay, document.body.firstChild);
//
//       var closeElement = setTimeout( function () {
//          overlay.parentNode.removeChild(overlay);
//       }, delayTime);
//    }
//
//    var createListSuggestBox = function ( option , suggestBox ) {
//       var cls = ( option.class ) ? option.class : "suggest-content";
//       optionElm = ElementBuild({'tag' : 'li' , 'class' : cls}, option.hint);
//
//       suggestBox.appendChild(optionElm);
//
//       return optionElm;
//    }
//
//    h.getValPost = function () {
//       var formData = new FormData();
//
//       formData.append( input.name , input.value );
//
//       if (h.group) formData.append( 'ingroup' , h.group );
//
//       return formData;
//    }
//
//
//    var addEventClickList = function ( option , optionElm , suggestBox , optMultiple ) {
//       if ( optMultiple ) {
//          optionElm.addEventListener('click' , function () {
//             for (var i = 0; i < option.list.length; i++) {
//                if ( _(option.list[i].target).tagName === 'INPUT' ){
//                    _(option.list[i].target).value = option.list[i].val;
//                }
//                else { _( option.list[i].target ).innerHTML = option.list[i].val; }
//
//             }
//             suggestBox.parentNode.removeChild(suggestBox);
//             h.suggestBox = null;
//
//          });
//       } else {
//          optionElm.addEventListener('click' , function () {
//             input.value = option.val;
//             suggestBox.parentNode.removeChild(suggestBox);
//          });
//       }
//    }
//
//    h.onstart = function () {
//       input.classList.add("process-loading");
//       // console.log(h.suggestBox);
//    }
//
//    h.onfinish = function () {
//       input.classList.remove("process-loading");
//    }
//
//    h.onsuccess = function ( response ){
//       var optionElm = [];
//       switch (response.type) {
//          case 'suggestion':
//
//             if (response.option.length > 0) {
//                if (h.suggestBox){
//                   //before adding suggestBox, remove suggestBox before
//                   if (h.suggestBox.parentNode) {
//                      h.suggestBox.parentNode.removeChild( h.suggestBox );
//                      h.suggestBox = null;
//                   }
//                }
//
//                h.suggestBox = ElementBuild({tag: 'div', id:'suggest-box' });
//
//                for (var i = 0; i < response.option.length; i++) {
//                   (function (i) {
//                      var optionElm = createListSuggestBox(response.option[i] , h.suggestBox);
//                      addEventClickList( response.option[i] , optionElm , h.suggestBox , response.multiple );
//                   }(i));
//                }
//
//                h.suggestBox.style.position = "absolute";
//                h.suggestBox.style.textAlign = "left";
//                h.suggestBox.style.left = h.offsetLeft + "px";
//                h.suggestBox.style.minWidth = h.offsetWidth + "px";
//                h.suggestBox.style.width = "-webkit-max-content";
//                h.suggestBox.style.width = "-moz-max-content";
//                input.parentNode.insertBefore(h.suggestBox, input.nextSibling);
//             }
//             break;
//
//          case 'modal-box':
//             var success = ( "success" in response) ? response.success : true
//                , delayTime = response.delayURL || 3000;
//
//             if ( this.URLsuccess && success) {
//                var url = this.URLsuccess;
//
//                setTimeout( function () {
//                   window.location.href = url;
//                }, delayTime);
//             }
//
//             createOverlay ( response.message , delayTime );
//             break;
//
//          case 'dialog-box':
//             var dialogChild = ElementBuild({'tag' : 'div' , 'class' : 'hiccup-back-overlay-child'}, response.message),
//                dialog = ElementBuild({'tag' : 'div' , 'class' : 'hiccup-back-overlay'});
//
//             dialog.appendChild(dialogChild);
//
//             if (response.zindex) {
//                dialog.style.zIndex = response.zindex;
//             }
//
//             dialog.addEventListener('click', function(){
//                this.parentNode.removeChild( this );
//             });
//
//             document.body.appendChild( dialog );
//             break;
//          case 'inner-own-div':
//             _( response.targetDiv ).innerHTML = response.message;
//             break;
//       }
//
//    }
//
//    h.onprogress = function ( evt ) {
//       console.log(evt);
//    }
//
//    h.eventStart = function ( e ) {
//       if (_('suggest-box')) _('suggest-box').parentNode.removeChild(_('suggest-box'));
//       if ( (e.type == 'keyup' || e.type == 'keydown') && input.value.length > 0){
//          clearTimeout(h.myVar);
//          h.myVar = setTimeout(function(){
//             h.ajax.post();
//          }, 500);
//       } else {
//          h.ajax.post();
//       }
//    }
//
//    h.on = function () {
//       switch ( h.method ) {
//          case 'keydown':
//             input.addEventListener('keydown', h.eventStart);
//             break;
//          case 'keyup':
//             input.addEventListener('keyup', h.eventStart);
//             break;
//          case 'change':
//             input.addEventListener('change', h.eventStart);
//             break;
//          case 'click':
//             input.addEventListener('click', h.eventStart);
//             break;
//          default:
//       }
//
//    }
//
//    return h;
// }
//
//
// var scanHTML = function () {
//    var form = document.querySelectorAll("form[fm-controller]")
//       , input = document.querySelectorAll("input[in-controller]")
//       , button = document.querySelectorAll("button[in-controller]")
//       , select = document.querySelectorAll("select[in-controller]")
//       , orderingDiv = document.querySelectorAll("form[od-controller]")
//       , controllerForm = []
//       , controllerInput = []
//       , controllerButton = []
//       , controllerOrder = []
//       , controllerSelect = []
//       , ajax = [];
//
//    for (var i = 0; i < select.length; i++) {
//       controllerSelect[i] = new hiccupElementController(select[i]);
//       controllerSelect[i].on();
//    }
//
//    for (var i = 0; i < form.length; i++) {
//       controllerForm[i] = new hiccupFormController(form[i]);
//       controllerForm[i].onsubmit();
//    }
//
//    for (var i = 0; i < input.length; i++) {
//       controllerInput[i] = new hiccupElementController(input[i]);
//       controllerInput[i].on();
//    }
//
//    for (var i = 0; i < button.length; i++) {
//       controllerButton[i] = new hiccupElementController(button[i]);
//       controllerButton[i].on();
//    }
//
//    for (var i = 0; i < orderingDiv.length; i++) {
//       controllerOrder[i] = new hiccupOderController(orderingDiv[i]);
//       controllerOrder[i].scan();
//       controllerOrder[i].onsubmit();
//    }
// }
//
// window.onload = function () {
//    scanHTML();
// }

})();
