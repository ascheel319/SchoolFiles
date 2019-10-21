<!DOCTYPE html>
<html>
	<head><title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="mainStyle.css">
	</head>

	<body>
		<div class="welcomeMessage">Welcome to the RFQ System</div>
	<div class="buttons">
		<button class="RFQbutton" onclick="window.location.href = 'createRFQ.php';">Create A New RFQ</button>
		<button class="Reportbutton" onclick="window.location.href = 'GenerateReport.php';">Generate A Report</button>
		<button class="Partbutton" onclick="window.location.href = 'creatPart.php';">Create A New Inventory Part</button>
		<button class="Accountbutton" onclick="window.location.href = 'createAccount.php';">Create New Customer Account</button>
	</div>
		<?php
			include 'login.php';
                                        try
                                        {
                                        //start the connection and get the names
                                                $dsn = "mysql:host=courses;dbname=cs56711";
                                                $pdo = new PDO($dsn, $username, $password);
                                        }
                                        catch(PDOexception $e)
                                        {
                                                // handle that exception
                                                echo "Connection to database failed: " . $e->getMessage();
                                        }


			$removeEmpty = "DELETE FROM Customers WHERE firstName = '' OR firstName = 'a'";
			$result = $pdo->query($removeEmpty);

			$removeEmpty = "DELETE FROM Manufacturers WHERE mName = ' ' OR mName = 'a'";
			$result = $pdo->query($removeEmpty);

			$removeEmpty = "DELETE FROM Parts WHERE partName = '' OR partName = 'a'";
                        $result = $pdo->query($removeEmpty);

		?>

		<label class="information">How to use this website: </label>
			<br>
		<label class="steps">1: Make a Customer Account by clicking on the button and entering your information.</label>
			<br>
		<label class="steps">2: Create a New Part by clicking on the button and entering the information.(Not needed if your part is already made)</label>
			<br>
		<label class="steps">3: Click on Create RFQ to order a part to the account you made earlier.</label>
			<br>
		<label class="steps">4: After you have made an RFQ you can Generate A Report by clicking on the button.</label>



	</body>
</html>
