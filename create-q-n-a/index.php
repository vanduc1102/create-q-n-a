<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<head>
	<title>Creating question and anwser</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
	<!-- <script type="text/javascript" src="./ckeditor/ckeditor.js"></script> -->
	<script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
	<script type="text/javascript" src="main.js"></script>

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
			</div>
			<input class="width-90" id="question-tags" placeholder="tags" />
			<!-- <input placeholder="Choose user ask"/> -->
			<?php createUserSelectorElement($dbConnection, "user-ask"); ?>
		</div>
		<div class="answer-container">
			<h1>Answer : </h1>
			<div class="anwser-composer-container">
				<div class="anwser-composer" id="answer" contenteditable="true"></div>
			</div>
			<!-- <input placeholder="Choose user answer"> -->
			<?php createUserSelectorElement($dbConnection, "user-answer"); ?>
		</div>
		<button class="btn btn-primary" onclick="onSubmitData(event)">Submit</button>
	</div>
</div>

</body>
</html>