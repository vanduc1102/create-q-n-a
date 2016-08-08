function onSubmitData($event) {
    var data = getData();
    console.log("onSubmitData ", data);
    var jqxhr = $.post("create-question-and-answer.php",data, function() {
            console.log("success");
        })
        .done(function() {
            console.log("second success");
            showSuccess();
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
    var questionBody = CKEDITOR.instances.question.getData();
    var questionUser = $("#user-ask").val();
    var questionTags = $("#question-tags").val();

    var answerUser = $("#user-answer").val();
    var answerBody = CKEDITOR.instances.answer.getData();
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
function checkValidate(){
    var questionTitle = $("#question-title").val();
    var questionCategory = $("#question-category").val();
    var questionBody = CKEDITOR.instances.question.getData();
    var questionUser = $("#user-ask").val();
    var questionTags = $("#question-tags").val();
    var answerUser = $("#user-answer").val();
    var answerBody = CKEDITOR.instances.answer.getData();

    if(questionTitle && questionTitle.length < 20){
        alert("Please input question title with length > 20 characters");
        return false;
    }
    if(questionCategory == ''){
        alert("Please input question title with length > 20 characters");
        return false;
    }
}

function resetData(){
    $("#question-title").val('');
    $("#question-category").val('');
    CKEDITOR.instances.question.setData('');
    $("#user-ask").val('');
    $("#question-tags").val('');

    $("#user-answer").val('');
    KEDITOR.instances.answer.setData('');
}

CKEDITOR.config.height = 150;
CKEDITOR.config.width = 'auto';

$(function(){
    CKEDITOR.replace( 'question' );
    CKEDITOR.replace( 'answer' );
});

function showWarning(){
    var element = $('alert-danger');
    element.addClass("show-alert");
    setTimeout(function(){
        element.removeClass("show-alert");
    },2000);
}
function showSuccess(){
    var element = $('alert-success');
    element.addClass("show-alert");
    setTimeout(function(){
        element.removeClass("show-alert");
    },2000);
}