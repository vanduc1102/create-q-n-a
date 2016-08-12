<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<head>
	<title>Creating question and anwser</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<!-- <script type="text/javascript" src="./ckeditor/ckeditor.js"></script> -->
	<script src="//cdn.ckeditor.com/4.5.10/standard/ckeditor.js"></script>
	<script type="text/javascript" src="main.js"></script>

</head>
<body>
<div class="spiner-div" id="spiner-container">
    <img src="./spinner.gif"/>
</div>
<?php
	require_once 'create-element-from-db.php';
?>
<div class="container container-fluid">
	<div class="form col-xs-12">
		<div class="question-container">
			<h1>Questions : </h1>
			<div class="input-group title">
				<input class="width-90 form-control" id="question-title" placeholder="Title of question" onchange="onChange(event)" />
			</div>
			<div class="input-group select-category">
			<!-- <input class="" placeholder="Category" /> -->
				<?php createCagetorySelectorElement($dbConnection, "question-category"); ?>
			</div>
			<div class=" question-composer-container">
				<div class="question-composer" id="question" contenteditable="true"></div>
			</div>
			<div class="input-group tags">
				<input class="width-90 form-control" id="question-tags" placeholder="tags" onchange="onChange(event)" />
			</div>
			<div class="input-group">
			<!-- <input placeholder="Choose user ask"/> -->
			<?php createUserSelectorElement($dbConnection, "user-ask"); ?>
			</div>
		</div>
		<div class="answer-container">
			<h1>Answer : </h1>
			<div class="anwser-composer-container">
				<div class="anwser-composer" id="answer" contenteditable="true"></div>
			</div>
			<!-- <input placeholder="Choose user answer"> -->
			<div class="input-group">
				<?php createUserSelectorElement($dbConnection, "user-answer"); ?>
			</div>
		</div>
		<button class="btn btn-primary btn-submit" onclick="onSubmitData(event)">Submit</button> <span id="toast-message"></span>
	</div>
</div>
</body>
</html>