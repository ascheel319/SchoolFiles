<html>
	<head><title>Assignment 10 Page 1</title></head>
	<body>
		<?php
			include 'login.php';
			try
			{
				$dsn = "mysql:host=courses;dbname=z1790270";
				$pdo = new PDO($dsn, $username, $password);

				//boat name, owner first and last name, marina name, slipnum of boat
				$select = "SELECT MarinaSlip.BoatName, Owner.FirstName, Owner.LastName, Marina.Name, MarinaSlip.SlipNum From Marina, MarinaSlip, Owner WHERE MarinaSlip.OwnerNum = Owner.OwnerNum AND Marina.MarinaNum = MarinaSlip.MarinaNum;";

				$sql = $pdo->prepare($select);
				$sql->execute();
			}
			catch(PDOexception $e)
			{ // handle that exception
	                	echo "Connection to database failed: " . $e->getMessage();
			}
		?>

			 <table align = "center" border="1">
				<thead>
					<tr>
						<th>Boat Name</th>
						<th>Owner Last Name</th>
						<th>Owner First Name</th>
						<th>Marina</th>
						<th>Slip Number</th>
					</tr>
				</thead>
				<tbody>

					<?php
						while ($row = $sql->fetch())
						{
							echo "<tr>";
								echo "<td>".$row['BoatName']."</td>";
								echo "<td>".$row['LastName']."</td>";
								echo "<td>".$row['FirstName']."</td>";
								echo "<td>".$row['Name']."</td>";
								echo "<td>".$row['SlipNum']."</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		<p align="center">
			<a href="http://students.cs.niu.edu/~z1790270/assign10/page1.php">Page 1</a>
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
