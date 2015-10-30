
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
                     obj.onsuccess( xmlhttp.responseText );
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
