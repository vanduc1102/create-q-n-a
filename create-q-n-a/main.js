function onPasteQuestion(e){
  var element = "#question-preview";
  pasteData(e,element);  
}

function onPasteAnswer(e){
  var element = "#answer-preview";
  pasteData(e,element); 
}

function pasteData(e,element){
  var content;
  e.preventDefault();
  if( e.originalEvent.clipboardData ){
    content = (e.originalEvent || e).clipboardData.getData('text/html');
    $(element).html(content);
    document.execCommand('insertText', false, content);
  }
  else if( window.clipboardData ){
    content = window.clipboardData.getData('text/html');
    if (window.getSelection){
      window.getSelection().getRangeAt(0).insertNode( document.createTextNode(content) );
      $(element).html(content);
    }
  }
}



/////// EVENT BINDING /////////

// jQuery delegated event listener
$(document).on('paste', '#question', onPasteQuestion);
$(document).on('paste', '#answer', onPasteAnswer);
// on-element event listener
// document.body.addEventListener("paste", onPaste);
