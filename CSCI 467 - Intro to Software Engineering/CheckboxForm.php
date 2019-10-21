<?php
    require 'login.php';
	$selectAll = 'unchecked';
    global $choice;
	
	
	

    if (isset($_POST["radio"])) {
         
		 $selected_radio = $_POST['radio'];

         if ($selected_radio == 'Select All') {
                $selectAll_status = 'checked';
				$choice = "";
				$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "update userChoice set choice = '$choice'";
				$statement = $conn->query($sql);

          }elseif ($selected_radio == 'Part ID') {
                $choice = 'partID';
                $conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "update userChoice set choice = '$choice'";
				$statement = $conn->query($sql);
	
          }
		  elseif ($selected_radio == 'Part Name' ) {
                $choice = 'partName';
                $conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "update userChoice set choice = '$choice'";
				$statement = $conn->query($sql);
			
				
          }
		   elseif ($selected_radio == 'mName') {
                $choice = 'mName';
                $conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "update userChoice set choice = '$choice'";
				$statement = $conn->query($sql);
	
          }
		  else {
			  
			  $choice = 'Error';
		  }
	}	
	
								
									
	

?>