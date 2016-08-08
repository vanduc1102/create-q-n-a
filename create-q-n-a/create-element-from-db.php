<?php
	require_once 'dbconnection.php';

	function createCagetorySelectorElement($conn, $elementId){

		$sql = "SELECT categoryid, title FROM qa_categories";

		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    echo "<select class=\"form-control\"  id=\"".$elementId."\">";
		    echo "<option value=''>Select Category</option>";
		    while($row = $result->fetch_assoc()) {
		    	echo "<option value=".$row["categoryid"].">".$row["categoryid"]."-".$row["title"]."</option>";
		    }
		    echo "</select>";
		} else {
		    echo "<p>No category for select</p>";
		}
	}

	function createUserSelectorElement($conn, $elementId){
		// Select all confirmed user
		$sql = "SELECT userid, handle FROM `qa_users` WHERE emailcode = ''";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    echo "<select class=\"form-control\"   id=\"".$elementId."\">";
		    echo "<option value=''>Select User</option>";
		    while($row = $result->fetch_assoc()) {
		    	echo "<option value=".$row["userid"].">".$row["userid"]."-".$row["handle"]."</option>";
		    }
		    echo "</select>";
		} else {
		    echo "<p>No user existed for select</p>";
		}

	}


	// createCagetorySelectorElement($dbConnection, "vvvvvvvvvvvvvvvvvv");
	// echo "<br />";
	// createUserSelectorElement($dbConnection, "testing");

?>