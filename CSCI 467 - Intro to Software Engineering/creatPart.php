<!DOCTYPE html>
<html>
	<head><title>Create Inventory Part</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
	<body>
		<!--Login to the server-->
                <?php
	                include 'login.php';
                        try
                        {
				//start the connection and get the names
                                $dsn = "mysql:host=courses;dbname=cs56711";
                                $pdo = new PDO($dsn, $username, $password);

				$sql = "SELECT MAX(mID) FROM Manufacturers";
                                $value = $pdo->query($sql);

				$startsql = "INSERT into Manufacturers(mName) values('a')";
                                $result = $pdo->query($startsql);


			}
                        catch(PDOexception $e)
                        {
                        	// handle that exception
                                echo "Connection to database failed: " . $e->getMessage();
                        }

                ?>
		<h1 class="title">Create Inventory Part</h1>
		<form class="theForm" method="post">
			<fieldset class="partForm">
				<p>
					<label for="partID">(*)Part ID: </label>
					<input type="text" name="partID" size="50">
					<br>
				</p>
				<p>
                	                <label for="partName">(*)Part Name: </label>
                	                <input type="text" name="partName" size="50">
                	                <br>
                	        </p>
				<p>
                	                <label for="partPrice">(*)Part Price: </label>
                	                <input type="text" name="partPrice" size="50">
                	                <br>
                	        </p>
			</fieldset>
			<fieldset class="manufacturerForm">
				<p>
                                        <label for="mID">Manufacturer ID: </label>
                                        <?php
                                                while($row = $value->fetch())
                                                {
                                                        $id = $row[0];
                                                        echo $id;
                                                }
                                        ?>
                                        <br>
                                </p>
				<p>
                                        <label for="mName">(*)Manufacturer Name: </label>
                                        <input type="text" name="mName" size="50">
                                        <br>
                                </p>
			</fieldset>
			<br>
			<button type="button" class="button" onclick="window.location.href = 'main.php';">Go Back</button>
                        <input type="reset" class="button" name="reset" value="Clear"></input>
                        <input type="submit" class="button" name="submit"value="Submit"></input>

		</form>

		<?php
			$partID = @($_POST["partID"]);
			$partName = @($_POST["partName"]);
			$partPrice = @($_POST["partPrice"]);
			$mID = $id;
			$mName = @($_POST["mName"]);
			if($_SERVER['REQUEST_METHOD'] === 'POST')
			{
				$partSQL = "INSERT into Parts(partName, partPrice, partID, mID) VALUES('$partName', '$partPrice', '$partID' , '$mID')";
				$result = $pdo->query($partSQL);

				$manufacturerSQL = "UPDATE Manufacturers SET mName = '$mName', mID = '$mID', partID = '$partID' WHERE mName = 'a' AND mID = '$id'";
				$result = $pdo->query($manufacturerSQL);
			}
		?>
	</body>
</html>
