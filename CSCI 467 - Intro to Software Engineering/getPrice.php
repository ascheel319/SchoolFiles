<?php

	$mysqli = new mysqli("courses", "cs56711", "d92Mwu9h4", "cs56711");
	if($mysqli->connect_error)
	{
		exit('Could not connect');
	}


	$sql = "SELECT partPrice FROM Parts WHERE partID = ?";

	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("s", $_GET['q']);
	$stmt->execute();
	$stmt->store_result();
	$stmt->bind_result($price);
	$stmt->fetch();
	$stmt->close();
	echo "<td>" .$price. "</td>";
?>
