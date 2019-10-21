<html>
	<head><title>Assignment 10 Page 3</title></head>
	<body>
		<?php
			include 'login.php';
			try
			{
				//start the connection
				$dsn = "mysql:host=courses;dbname=z1790270";
				$pdo = new PDO($dsn, $username, $password);
			}
			catch(PDOexception $e)
			{
				//if it doesn't want to connect
				echo "Connection to database failed: " . $e->getMessage();
			}
			$sql = $pdo->query("SELECT MarinaSlip.BoatName FROM MarinaSlip");
		?>

	<form action="" method="post">
		<?php
			echo '<select name="Boats">';//start the drop down
			echo '<option value="Default" selected="selected">';

			while($row = $sql->fetch(PDO::FETCH_ASSOC))
			{
				echo '<option value="'.$row['BoatName'].'">'.$row['BoatName'].'</option>';
			}
			echo '</select>'
		?>

		<!--Buttons-->
		<input type="submit" name="submit" value="Submit"></input>
		<input type="reset" name="reset" value="Clear"></input>
	</form>

		<?php
			//gets the service records from the boat names
			if(isset($_POST['Boats']))
			{
				$boat = $_POST['Boats'];//very bad name but its all i got
				$sql = $pdo->prepare("SELECT ServiceID, Description, Status FROM ServiceRequest WHERE SlipID = (SELECT SlipID FROM MarinaSlip WHERE BoatName = '$boat')");
				$sql->execute();
			}
			else die;
		?>

		<table align = "center" border="1">
		<?php
			if($boat == "Default")
                                goto bottom;

			echo "<thead>";
				echo "<tr>";
					echo "<th>";
						echo "Service Done on ";
						echo $boat;
					echo "</th>";
				echo "</tr>";
				echo "<tr>";
					echo "<th>";
						echo "ServiceID";
					echo "</th>";
					echo "<th>";
						echo "Description";
					echo "</th>";
					echo "<th>";
						echo "Status";
					echo "</th>";
				echo "</tr>";
			echo "</thead>";
        		echo "<tbody>";
				$row = $sql->fetch();
				if($row)
				{
					echo "<tr>";
						echo "<td>".$row['ServiceID']."</td>";
						echo "<td>".$row['Description']."</td>";
						echo "<td>".$row['Status']."</td>";
					echo "</tr>";
					while($row = $sql->fetch())
					{
						echo "<tr>";
							echo "<td>".$row['ServiceID']."</td>";
						        echo "<td>".$row['Description']."</td>";
							echo "<td>".$row['Status']."</td>";
						echo "</tr>";
					}
				}
				else
				{
					echo "<tr>";
						echo "<td>";
							echo "No service has been done on this boat";
						echo "</td>";
					echo "</tr>";
				}
			echo "</tbody>";
		echo "</table>";

	bottom://just used so it will always print the links and my name
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
