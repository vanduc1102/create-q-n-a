function onPasteQuestion(e) {
    var element = "#question-preview";
    pasteData(e, element);
}

function onPasteAnswer(e) {
    var element = "#answer-preview";
    pasteData(e, element);
}

function pasteData(e, element) {
    var content;
    e.preventDefault();
    if (e.originalEvent.clipboardData) {
        content = (e.originalEvent || e).clipboardData.getData('text/html');
        $(element).html(content);
        document.execCommand('insertText', false, content);
    } else if (window.clipboardData) {
        content = window.clipboardData.getData('text/html');
        if (window.getSelection) {
            window.getSelection().getRangeAt(0).insertNode(document.createTextNode(content));
            $(element).html(content);
        }
    }
}

function onSubmitData($event) {
    var data = getData();
    console.log("onSubmitData ", data);
    var jqxhr = $.post("create-question-and-answer.php",data, function() {
            console.log("success");
        })
        .done(function() {
            console.log("second success");
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("finished");
        });
}

function getData() {
    var questionTitle = $("#question-title").val();
    var questionCategory = $("#question-category").val();
    var questionBody = $("#question").html();
    var questionUser = $("#user-ask").val();
    var questionTags = $("#question-tags").val();

    var answerUser = $("#user-answer").val();
    var answerBody = $("#answer").html();
    return {
        'q-title': questionTitle,
        'q-user': questionUser,
        'q-category': questionCategory,
        'q-body': questionBody,
        'q-tags': questionTags,
        'a-user': answerUser,
        'a-body': answerBody,
    };
}



/////// EVENT BINDING /////////

// jQuery delegated event listener
$(document).on('paste', '#question', onPasteQuestion);
$(document).on('paste', '#answer', onPasteAnswer);
$(document).on('keyup', '#question', onPasteAnswer);
$(document).on('keyup', '#answer', onPasteAnswer);
// on-element event listener
// document.body.addEventListener("paste", onPaste);
