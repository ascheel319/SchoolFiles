<?php
   include 'login.php';
   
   
   
   
    if (isset($_POST['pageSubmit'])) {
        $firstDate= $_POST['from'];
        $lastDate= $_POST['to'];
        echo $firstDate;
        echo $lastDate;


		
		
		$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "update userChoice set date = '$firstDate'";
		$sql2 = "update userChoice set date2 = '$lastDate'";
		$statement = $conn->query($sql);
		$statement = $conn->query($sql2);

  

	}


				




?>