function onSubmitData($event) {
    if(checkValidate()){
        var data = getData();
        $.post("create-question-and-answer.php",data, function(response) {
            console.log("success ",response);
            showSuccess(response);
        })
        .done(function() {
            console.log("second success");
            resetFields();
        })
        .fail(function() {
            showWarning();
        });
    }else{
        showWarning();
    }
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
    var questionBody = CKEDITOR.instances.question.getData();
    var questionTags = $("#question-tags").val();
    var answerUser = $("#user-answer").val();
    var answerBody = CKEDITOR.instances.answer.getData();

    if(checkEmpty("#question-title") 
    && checkEmpty("#question-category")
    && checkEmpty("#user-ask") 
    && checkEmpty("#question-tags")){
        return true;
    }
    return false;


}
function resetFields(){
    $("#question-tags").val('');
    $("#question-title").val('');
    $("#question-category").val('');
    CKEDITOR.instances.question.setData('');
    CKEDITOR.instances.answer.setData('');
}

function checkEmpty(element){
    var element = $(element);
    if(element.val().trim() === ''){
        addWarningClass(element);
        return false;
    }
    return true;
}

function addWarningClass(element){
    var inputGroupEle = element.closest("div.input-group");
    inputGroupEle.addClass('has-error');
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

    $('#question-category, #user-ask, #user-answer').on('change', onChange);
});

function showWarning(){
    var element = $('#toast-message');
    element.html("Opsss! Error somewhere, please check.");
    setTimeout(function(){
        element.html("");
    },2000);
}
function showSuccess(text){
    var element = $('#toast-message');
    if(!text){
        text = "Well done! You successfully created question and anwser.";
    }
    element.html(text);
    setTimeout(function(){
        element.html("");
    },2000);
}

function onChange(event){
	var ele = $(event.target);
    var inputGroupEle = ele.closest("div.input-group");
	if(inputGroupEle.hasClass("has-error") || ele.val().trim() !== ''){
		inputGroupEle.removeClass('has-error');
	}
}