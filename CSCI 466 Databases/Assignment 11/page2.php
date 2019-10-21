<html>
<!--
Andrew Scheel
z1790270
section 3
Due Date: April 27, 2018
-->
	<head><title>Assignment 11 Page 2</title></head>
	<body>
		<?php
			 include 'login.php';
                        //connect to the database
                        try
                        {
                                $dsn = "mysql:host=courses;dbname=z1790270";
                                $pdo = new PDO($dsn, $username, $password);

				$sql = "SELECT BoatName FROM MarinaSlip";
				$result = $pdo->query($sql);

                        }
                        catch(PDOexception $e)
                        {
                                echo "Connection to database Failed: ".$e->getMessage();
                        }
		?>

		<form action="" method="post">
		<p>
			<?php
				//drop down menu
				echo '<select name="BoatNames">';
				while($row = $result->fetch(PDO::FETCH_ASSOC))
				{
					echo '<option value="'.$row['BoatName'].'">'.$row['BoatName'].'</option>';
				}
				echo '</select>';
			?>
		</p>
			<p>
				<!--All the choices of repairs along with what they are-->

				<input type="radio" name="repair" value="1" required/>
				1: Routine engine maintenance
				<br />

				<input type="radio" name="repair" value="2"/>
				2: Engine repair
				<br />

				<input type="radio" name="repair" value="3"/>
				3: Air conditioning
				<br />

				<input type="radio" name="repair" value="4"/>
				4: Electrical systems
                                <br />

				<input type="radio" name="repair" value="5"/>
				5: Fiberglass repair
                                <br />

				<input type="radio" name="repair" value="6"/>
				6: Canvas installation
                                <br />

				<input type="radio" name="repair" value="7"/>
				7: Canvas repair
                                <br />

				<input type="radio" name="repair" value="8"/>
				8: Electronic systems (radar, GPS, autopilots, etc.)

			</p>

			<!--Buttons-->
			<input type="submit" name="submit" value="Submit"></input>
			<input type="reset" name="reset" value="Clear"></input>
		</form>
	<p>
			<?php
			if (isset($_POST["submit"]))
			{
				$boatselected = $_POST['BoatNames'];
				//getting the slipid
				$newslip = "SELECT SlipID FROM MarinaSlip WHERE BoatName = $boatselected";
				$result = $pdo->query($newslip);

				//getting the category of repairs that are requested
				$choice = $_POST['repair'];

				//getting the description that matches the repair category
				$desc = "SELECT CategoryDescription FROM ServiceCategory WHERE CategoryNum = '$choice'";

				//actually inserting everything
				$sql = "INSERT INTO ServiceRequest (SlipID, CategoryNum, Description, Status) VALUES((SELECT SlipID FROM MarinaSlip WHERE BoatName = '$boatselected'), '".$_POST['repair']."', ($desc), 'Scheduled');";
				$result = $pdo->query($sql);
			}
			?>
	</p>


<!--Links and Name at the bottom-->
	<p align="center">
		<a href="page1.php">Page 1</a>
		<a href="page2.php">Page 2</a>
	</p>
	<p align="center">
		Andrew Scheel</br>
		Section 3</br>
		Due Date: April 27, 2018
	</p>
	</body>
</html>
