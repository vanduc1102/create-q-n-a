<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<script src="//code.jquery.com/jquery-2.1.1.min.js"></script>
<head>
	<title>Creating question and anwser</title>
	<script type="text/javascript" src="main.js"></script>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<?php
	require_once 'create-element-from-db.php';
?>
<div class="container container-fluid">
	<div class="form col-xs-12 col-lg-6">
		<div class="question-container">
			<h1>Questions : </h1>
			<input class="width-90" id="question-title" placeholder="Title of question" />
			<!-- <input class="" placeholder="Category" /> -->
			<?php createCagetorySelectorElement($dbConnection, "question-category"); ?>
			<div class=" question-composer-container">
				<div class="question-composer" id="question" contenteditable="true"></div>
				<div class='placeholder'>paste HTML here <br><br>Go to some website and select things with your mouse and copy-paste it here</div>
			</div>
			<input class="width-90" id="question-tags" placeholder="tags" />
			<!-- <input placeholder="Choose user ask"/> -->
			<?php createUserSelectorElement($dbConnection, "user-ask"); ?>
		</div>
		<div class="answer-container">
			<h1>Answer : </h1>
			<div class="anwser-composer-container">
				<div class="anwser-composer" id="answer" contenteditable="true"></div>
				<div class='placeholder'>paste HTML here <br><br>Go to some website and select things with your mouse and copy-paste it here</div>
			</div>
			<!-- <input placeholder="Choose user answer"> -->
			<?php createUserSelectorElement($dbConnection, "user-answer"); ?>
		</div>
		<button class="btn btn-primary" onclick="onSubmitData(event)">Submit</button>
	</div>
	<div class="preview col-xs-12 col-lg-6">
		<div class="container row">
			<h1>Preview here :</h1>
			<h2>Question : </h2>
			<div class="row" id="question-preview">
				
			</div>
			<h2>Answer : </h2>
			<div class="row" id="answer-preview">
				
			</div>
		</div>
	</div>
</div>

</body>
</html>