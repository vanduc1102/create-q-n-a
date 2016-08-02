<?php
/*
	Create question random
	Put this file in folder:qa-external-example
	Run it with URL: http://localhost/question2answer/qa-external-example/create-question-and-answer.php
*/

require_once '../qa-include/qa-base.php';

require_once QA_INCLUDE_DIR.'qa-app-users.php';
require_once QA_INCLUDE_DIR.'qa-app-posts.php';

$guid = guidv4();
$type = 'Q'; // question
$parentid = null; // does not follow another answer
$title = 'Tại sao chim lại biết hót?' . $guid;
$content = 'Và tại sao chúng lại yêu nhau - đúng là lắm chuyện mà phải không?' . $guid;
$format = ''; // plain text
$categoryid = 1; // assume no category
$tags = array('chim cò', 'hát hò', 'yêu đương');
$question_user_id = 9;
$answer_user_id = 10;

$qId = qa_post_create($type, $parentid, $title, $content, $format, $categoryid, $tags, $question_user_id);

$answerContent = $guid . " Đọc bài phỏng vấn của blog Vinacode với anh Nguyễn Bá Thành, là người sáng lập và cựu CEO WePlay, chuyên gia mobile game/app với hơn 5 năm kinh nghiệm startup trong ngành mobile, mentor và business owner của 2 startup mobile app. Để nghe anh chia sẻ về";
$aId = qa_post_create("A", $qId, null,$answerContent , $format, null , null , $answer_user_id);


echo "Successful answer_id=" . $aId;

function guidv4()
{
    if (function_exists('com_create_guid') === true)
        return trim(com_create_guid(), '{}');

    $data = openssl_random_pseudo_bytes(16);
    $data[6] = chr(ord($data[6]) & 0x0f | 0x40); // set version to 0100
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80); // set bits 6-7 to 10
    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}

?>