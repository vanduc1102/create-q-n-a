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
<div class="container container-fluid">
	<div class="form col-xs-12 col-lg-6">
		<div class="question-container">
			<input class="" placehodler="Title here" />
			<input class="" placeholder="Category" />
			<div class=" question-composer-container">
				<div class="question-composer" id="question" contenteditable="true"></div>
				<div class='placeholder'>paste HTML here <br><br>Go to some website and select things with your mouse and copy-paste it here</div>
			</div>
			<input class="" placeholder="tags" />
			<input placeholder="Choose user ask"/>
		</div>
		<div class="answer-container">
			<div class="anwser-composer-container">
				<div class="anwser-composer" id="answer" contenteditable="true"></div>
				<div class='placeholder'>paste HTML here <br><br>Go to some website and select things with your mouse and copy-paste it here</div>
			</div>
			<input placeholder="Choose user answer">
		</div>
		<button class="btn btn-primary" onclick="saveData($event)">Submit</button>
	</div>
	<div class="preview col-xs-12 col-lg-6">
		<div class="container row">
			<h1>Preview here</h1>
			<div class="row" id="question-preview"></div>
			<div class="row" id="answer-preview"></div>
		</div>
	</div>
</div>

</body>
</html>