<html>
	<head><title>Assignment 11 Page 1</title></head>
	<body>
		<?php
			include 'login.php';
			//connect to the database
			try
			{
				$dsn = "mysql:host=courses;dbname=z1790270";
				$pdo = new PDO($dsn, $username, $password);
			}
			catch(PDOexception $e)
			{
				echo "Connection to database Failed: ".$e->getMessage();
			}
		?>
<!--fields that are needed: Last Name, First Name, Address, city, state, zip-->
	<h1>New Owner Info</h1>
	<p>Please fill in the following information:</p>
	<form action="" method="post">
		<p>First Name:
		<input type = "text" name = "ownerFirstName" size = "20"  maxlength="20" required/>
		</p>

		<p>Last Name:
                <input type = "text" name = "ownerLastName" size = "50" maxlength="50" required/>
                </p>

		<p>Address:
		<input type="text" name="ownerAddress" size="15" maxlength="15" required>
		</p>

		<p>City:
		<input type="text" name="ownerCity" size="15" maxlength="15" required>
		</p>

		<p>State:
		<input type="text" name="ownerState" size="2" maxlength="2" required>
		</p>

		<p>Zip Code:
		<input type="text" name="ownerZip" size="5" maxlength="5" required>
		</p>

		<input type="submit" name="submit" value="Submit"></input>
		<input type="reset" name="reset" value="Clear"></input>
	</form>

	<?php
		//somehow use the $_POST
		//echo 'HI '.$_POST["ownerFirstName"].$_POST["ownerLastName"];
		if(isset($_POST['ownerLastName']))
		{
			$sql = "INSERT INTO Owner (LastName, FirstName, Address, City, State, Zip) VALUES('".$_POST['ownerLastName']."', '".$_POST['ownerFirstName']."', '".$_POST['ownerAddress']."', '".$_POST['ownerCity']."', '".$_POST['ownerState']."', '".$_POST['ownerZip']."');";
		//	echo $sql;
			$result = $pdo->exec($sql);
		}
		//use this to reset the auto increment part of the table after testing
		//ALTER TABLE Owner AUTO_INCREMENT = 10;
	?>



<!--Links and Name at the bottom-->
	<p align="center">
		<a href="page1.php">Page 1</a>
		<a href="page2.php">Page 2</a>
		<a href="page3.php">Page 3</a>
	</p>
	<p align="center">
		Andrew Scheel</br>
		Section 3</br>
		Due Date: April 27, 2018
	</p>
	</body>
</html>
