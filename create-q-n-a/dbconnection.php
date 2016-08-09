<?php

	require_once '../../qa-config.php';

	$dbConnection = mysqli_connect(QA_MYSQL_HOSTNAME, QA_MYSQL_USERNAME,QA_MYSQL_PASSWORD,QA_MYSQL_DATABASE ) or die(mysqli_error($dbc));
	
	mysqli_set_charset($dbConnection,"utf8");

	function testConnection($dbConnection){
		if (!$dbConnection) {
			die('Could not connect: ' . mysql_error());
		}

		echo 'Connected successfully : <br />host = '.QA_MYSQL_HOSTNAME.'<br />dbname = '.QA_MYSQL_DATABASE.'<br />';
	}

	//testConnection($dbConnection);
	
?>