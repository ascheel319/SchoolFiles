<html>
	<head><title>Assignment 10 Page 2</title></head>
	<body>
		<!--connecting to mysql database and sending queary -->
			<?php
				include 'login.php';
				try
				{
				//start the connection and get the names
					$dsn = "mysql:host=courses;dbname=z1790270";
					$pdo = new PDO($dsn, $username, $password);

					$sql = "SELECT LastName FROM Owner";
					$result = $pdo->query($sql);

				}
				catch(PDOexception $e)
				{
					// handle that exception
					echo "Connection to database failed: " . $e->getMessage();
				}
			?>

		<form action="" method="post">
			<?php
				//drop down for the Last Name selection
				echo '<select name="OwnerLastName">';//start the drop down
				echo '<option value="Default" selected="selected">';

				while($row = $result->fetch(PDO::FETCH_ASSOC))
				{
					echo '<option value="'.$row['LastName'].'">'.$row['LastName'].'</option>';
				}
				echo '</select>';//end the drop down

			?>

			<input type="submit" name="submit" value="Submit"></input>
			<input type="reset" name="reset" value="Clear"></input>
		</form>

			<?php
				//get the boat names of that person's last name
				if(isset($_POST['OwnerLastName']))
				{
					$lastName = $_POST['OwnerLastName'];
					if($lastName == "Default")
					{
						goto bottom;//will skip the else and just go below it
					}
					else
					{
						$boats = "SELECT MarinaSlip.BoatName FROM MarinaSlip WHERE MarinaSlip.OwnerNum = (SELECT OwnerNum FROM Owner WHERE LastName = '$lastName')";

						$sql = $pdo->query($boats);

						echo "<table align='center' border='1'>";

						echo "<thead>";
							echo "<tr>";
								echo "<th>";
									echo $lastName;
									echo "'s Boat(s)";
								echo "</th>";
							echo "</tr>";
						echo "<thead>";

						echo "<tbody>";

							while($row = $sql->fetch())
							{
								echo "<tr>";
									echo "<td>";
										echo $row['BoatName'];
									echo "</td>";
								echo "</tr>";
							}

						echo "</tbody>";




						echo "</table>";

					}
				}
				bottom://just used to skip the else to print the links and my name
			?>

		<p align="center">
			<a href="http://students.cs.niu.edu/~z1790270/assign10/page1.php"> Page 1</a>
			<a href="http://students.cs.niu.edu/~z1790270/assign10/page2.php">Page 2</a>
			<a href="http://students.cs.niu.edu/~z1790270/assign10/page3.php">Page 3</a>
		</p>


		<p align="center">
			Andrew Scheel </br>
			section 3 </br>
			Due Date: April 20, 2018
		</p>
	</body>

</html>
