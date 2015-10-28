(function() {
   var importDoc = document._currentScript.ownerDocument;

   // az-input js
   var aztexteditor = Object.create(HTMLTextAreaElement.prototype);

   function hideVisibility (elm){
      if (elm.style.visibility == 'visible') {
         elm.style.visibility = 'hidden';
      }
   }

   function showVisibility (elm) {
      elm.style.visibility = 'visible';
   }

   function _(node, id){
      return node.getElementById(id);
   }

   function _q(node, elm) {
      return node.querySelectorAll(elm);
   }

   function printDoc(documentPrint){
      var oPrntWin = window.open("","_blank","width=544,height=784,left=400,top=100,menubar=yes,toolbar=no,location=no,scrollbars=yes");
      oPrntWin.document.open();
      oPrntWin.document.write("<!doctype html><html><head><title><\/title><\/head><body onload=\"print();\">" + documentPrint.body.innerHTML + "<\/body><\/html>");
      oPrntWin.document.close();
   }

   function triggerExecCommand(elm, command, value){
     elm.execCommand(command, false, value);
     elm.body.focus();
   }

   function texteditorUpdate(elm , content){
      elm.value = content;
   }

   aztexteditor.createdCallback = function () {
      var template = importDoc.querySelector("template#text-editor");
      var main = this;

      this.name = this.getAttribute('name');

      var clone = importDoc.importNode(template.content, true);

      var editor = clone.querySelector('iframe')
         , toolsaztexteditor = clone.getElementById('tools-aztexteditor');

      var buttonPrint = _(clone, 'azprint')
         , buttonUndo = _(clone, 'azundo')
         , buttonRedo = _(clone, 'azredo')
         , buttonRemoveFormat = _(clone, "azremove-format")
         , buttonFont = _(clone, "azfont")
         , buttonFontSize = _(clone, "azfont-size")
         , buttonBold = _(clone, "azbold")
         , buttonItalic = _(clone, "azitalic")
         , buttonUnderline = _(clone, "azunderline")
         , buttonStrikeThrough = _(clone, 'azstrike-through')
         , buttonScript = _q(clone, 'input[type=radio][name=azscript]')
         , buttonMargin = _q(clone, 'input[type=radio][name=azmargin]')
         , buttonList = _q(clone, 'input[type=radio][name=azlist]')
         , buttonIndent = _(clone, 'azindent')
         , buttonOutdent = _(clone, 'azoutdent')
         , buttonForeColor = clone.getElementById('fore-color-header')
         , foreColor = clone.getElementById('fore-color-select')
         , valueForeColor = clone.querySelectorAll('input[type=radio][name=foreColor]');

      var timer = null;

      this.style.display = 'none';

      this.parentNode.insertBefore(clone, this.nextSibling);

      if (editor.contentDocument) {
         var editorContent = editor.contentDocument;
      } else if (editor.contentWindow) {
         var editorContent = editor.contentWindow;
      }

      editorContent.body.innerHTML = this.textContent;

      editorContent.designMode = 'on';

      editorContent.addEventListener('keyup', function(){
         if (timer) clearTimeout(timer);
         timer = setTimeout(function () {
            texteditorUpdate(main, editorContent.body.innerHTML);
         }, 1000);
      });

      buttonPrint.onclick = function() {
         printDoc(editorContent);
      }

      buttonUndo.onclick = function() {
         triggerExecCommand(editorContent, 'undo', '');
         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      buttonRedo.onclick = function() {
         triggerExecCommand(editorContent, 'redo', '');
         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      buttonRemoveFormat.onclick = function() {
         triggerExecCommand(editorContent, 'removeformat', '');
         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      buttonFont.onchange = function() {
         if (this.value == 'null') triggerExecCommand(editorContent, 'removeformat', 'FontName');
         else triggerExecCommand(editorContent, 'FontName', this.value);

         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      buttonFontSize.onchange = function() {
         triggerExecCommand(editorContent, 'FontSize', this.value);
         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      buttonBold.onclick = function() {
         if (this.classList.contains('selected')) this.classList.remove('selected');
         else this.classList.add('selected');

         triggerExecCommand(editorContent, 'bold', '');
         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      buttonItalic.onclick = function() {
         if (this.classList.contains('selected')) this.classList.remove('selected');
         else this.classList.add('selected');

         triggerExecCommand(editorContent, 'italic', '');
         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      buttonUnderline.onclick = function() {
         if (this.classList.contains('selected')) this.classList.remove('selected');
         else this.classList.add('selected');

         triggerExecCommand(editorContent, 'underline', '');
         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      buttonStrikeThrough.onclick = function() {
         if (this.classList.contains('selected')) this.classList.remove('selected');
         else this.classList.add('selected');

         triggerExecCommand(editorContent, 'strikeThrough', '');
         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      for (var i = 0; i < buttonScript.length; i++) {
         buttonScript[i].addEventListener('click', function(){
            triggerExecCommand(editorContent, this.value, '');
            texteditorUpdate(main, editorContent.body.innerHTML);
         });
      }

      buttonForeColor.addEventListener('click', function(e){
         showVisibility(foreColor);
         e.stopPropagation();

         buttonForeColor.focus();
      });

      editorContent.addEventListener('click', function(e){
         hideVisibility(foreColor);
         e.stopPropagation();
      });

      for (var i = 0; i < valueForeColor.length; i++) {
         valueForeColor[i].addEventListener('click', function(e){
            if (this.checked) {
               _(document, "foreColorSelected").style.borderColor=this.value;
               triggerExecCommand(editorContent, 'ForeColor', this.value);

               texteditorUpdate(main, editorContent.body.innerHTML);
            }

            hideVisibility(foreColor);
            e.stopPropagation();
         })
      }

      for (var i = 0; i < buttonMargin.length; i++) {
         buttonMargin[i].addEventListener('click', function(){
            triggerExecCommand(editorContent, this.value, '');
            texteditorUpdate(main, editorContent.body.innerHTML);
         });
      }

      for (var i = 0; i < buttonList.length; i++) {
         buttonList[i].addEventListener('click', function(){
            triggerExecCommand(editorContent, this.value, '');
            texteditorUpdate(main, editorContent.body.innerHTML);
         });
      }

      buttonIndent.onclick = function() {
         triggerExecCommand(editorContent, 'indent', '');
         texteditorUpdate(main, editorContent.body.innerHTML);
      }

      buttonOutdent.onclick = function() {
         triggerExecCommand(editorContent, 'outdent', '');
         texteditorUpdate(main, editorContent.body.innerHTML);
      }
   }

   document.registerElement('az-texteditor', {
      prototype: aztexteditor ,
      extends: 'textarea'
   });

})();
