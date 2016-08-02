function onPaste(e,element){
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
$(document).on('paste', '#question', onPaste(e,"#question-preview"));
$(document).on('paste', '#answer', onPaste(e,"#answer-preview"));
// on-element event listener
// document.body.addEventListener("paste", onPaste);
