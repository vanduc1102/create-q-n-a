<?php
/*
	Create question random
	Put this file in folder:qa-external-example
	Run it with URL: http://localhost/question2answer/qa-external-example/create-question-and-answer.php
*/

require_once '../../qa-include/qa-base.php';

require_once QA_INCLUDE_DIR.'qa-app-users.php';
require_once QA_INCLUDE_DIR.'qa-app-posts.php';

$parentid = null; // does not follow another answer
$title = $_POST['q-title'];
$content = $_POST['q-body'];
$format = 'html'; // plain text
$categoryid = $_POST['q-category']; // assume no category
$tags = remoteInvalidTags(explode(",",$_POST['q-tags']));
$question_user_id = $_POST['q-user'];
if($question_user_id !== '' && $title !== '' && $categoryid !== ''){
	$q_id = qa_post_create("Q", $parentid, $title, $content, $format, $categoryid, $tags, $question_user_id);
	if($q_id > 0){
		$answer_content = $_POST['a-body'];
		$a_user_id = $_POST['a-user'];		
		if($answer_content !== '' && $a_user_id !== ''){
			qa_post_create("A", $q_id, null,$answer_content , $format, null , null , $a_user_id);
			http_response_code(201);
			echo "Created Q&A";
		}else{
			http_response_code(500);
			echo "Internal Server Error";
		}
		http_response_code(201);
		echo "Created Q";
	}
}
http_response_code(200);
echo "Ok, Nothing was created";

/**
A tag should have a length > 2 characters
**/
function remoteInvalidTags($tags){
	foreach($tags as $index => $tag) {
		if(strlen($tag) < 3){
    		unset($tags[$index]);
    	}
	}
	return $tags;
}
?>