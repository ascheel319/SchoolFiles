<!DOCTYPE html>
<html>
	<head><title>Create New RFQ</title>
	<link rel="stylesheet" type="text/css" href="RFQstyle.css"/><!--need this to tell what file has the css stuff-->

			<!--Found the calendar drop down here: "http://jqueryui.com/datepicker/"-->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>jQuery UI Datepicker - Default functionality</title>
			<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
			<link rel="stylesheet" href="/resources/demos/style.css">
			<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script>
				$( function()
				{
					$( "#datepicker" ).datepicker();
				});
			</script>
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

					//used for the parts drop down
                       	                $partsql = "SELECT partID FROM Parts";
                       	                $partresult = $pdo->query($partsql);

					//used for the part price
					$pricesql = "SELECT partPrice FROM Parts";
					$priceresult = $pdo->query($pricesql);

					$accountIDsql = "SELECT accountID FROM Customers";
					$accountresult = $pdo->query($accountIDsql);

                       	        }
                       	        catch(PDOexception $e)
                       	        {
                       	                // handle that exception
					echo "Connection to database failed: " . $e->getMessage();
				}
			?>





			<h1 class="title">Create RFQ</h1>
			<form class="theForm" method="post">

				<fieldset class="formleft">
					<p>
						<label for="managerName">(*)Sales Manager Name: </label><input type="text" name="managerName" size="50" required>
						<br>
					</p>
					<p>
	                	                <label for="accountID">(*)Account ID: </label>
                        	                <?php
                        	                        echo '<select id="accountID" name="accountID" onchange="showAccoutID(this.value)" method="post" required>';
                        	                        echo '<option value="" selected="selected">';

	                                                while($row = $accountresult->fetch(PDO::FETCH_ASSOC))
	                                                {
	                                                        echo '<option value="'.$row['accountID'].'">'.$row['accountID'].'</option>';
	                                                }
	                                                echo '</select>';//end the drop down
	                                        ?>
	                                        <br>

						<label for="accountPassword">(*)Account Password: </label>
						<input type="password" name="accountPassword" size="50" required>
					</p>
					<p>
						<label for="repName">(*)Customer Representative: </label>
						<input type="text" name="repName" size="50" required>
						<br>
					</p>
					<p>
					<label for="partNumber">(*)Part Number: </label>
						<?php
							//drop down so that any parts that are already made come up
							echo '<select id="partNumber" name="partNumber" onchange="showPrice(this.value)" required>';
							echo '<option value="" selected="selected">';

							while($row = $partresult->fetch(PDO::FETCH_ASSOC))
			                                {
			                                        echo '<option value="'.$row['partID'].'">'.$row['partID'].'</option>';
			                                }
			                                echo '</select>';//end the drop down
						?>
						
					</p>
					<p>
						<label for="partPrice">(*)Part Price: </label><label id="price">Please Select a Part to Receieve a Price</label>
						<script>
							function showPrice(str)
							{
								var xhttp;
								if (str == "")
								{
									document.getElementById("price").innerHTML = "Please Select a Part to Receieve a Price";
									return;
								}
								xhttp = new XMLHttpRequest();
								xhttp.onreadystatechange = function()
								{
									if(this.readyState == 4 && this.status == 200)
									{
										document.getElementById("price").innerHTML = "$" + this.responseText;//changes the text to the price of the item that is selected
									}
								};
								xhttp.open("GET", "getPrice.php?q="+str, true);
								xhttp.send();
							}
						</script>
						
					</p>
					<p>
						<label for="partQuantity">(*)Quantity: </label>
						<input type="number" name="partQuantity" min="1" required>
						<br>
					</p>
					<p>
					<label for="requiredDate">(*)Requested Date: </label>
                        	        <input type="text" id="datepicker" size="8" name="reqDate" required>
						<br>
					</p>
				</fieldset>

				<br>
<div class="buttons">			<button class="button" onclick="window.location.href = 'main.php';">Go Back</button>
				<input type="reset" class="button" name="reset" value="Clear"></input>
				<input type="submit" class="button" name="submit"value="Submit"></input>
</div>
			</form>

		<?php

			$accountID = @($_POST["accountID"]);
			$password = @($_POST["accountPassword"]);

			//grabbing the password for the accountID that was selected
			$pass = "SELECT cutomerPassword From Customers WHERE accountID = '$accountID'";
			$passresults = $pdo->query($pass);

			while($row = $passresults->fetch())
			{
				//if its true then it will add to the database if not an alert will come up and stop the submission
				if(strcmp($row[0], $password) == 0)
				{
					$salesManager = @($_POST["managerName"]);
					$customerRep = @($_POST["repName"]);
					$partNumber = @($_POST["partNumber"]);
					$partQuantity = @($_POST["partQuantity"]);
					$requiredDate = @($_POST["reqDate"]);

					$sAddress1 = @($_POST["shippingAddress1"]);
					$sAddress2 = @($_POST["shippingAddress2"]);
					$sState = @($_POST["shippingState"]);
					$sZipCode = @($_POST["shippingZipCode"]);
					$sCity = @($_POST["shippingCity"]);

					$bAddress1 = @($_POST["billingAddress1"]);
					$bAdress2 = @($_POST["billingAddress2"]);
					$bState = @($_POST["billingState"]);
					$bZipCode = @($_POST["billingZipCode"]);
					$bCity = @($_POST["billingCity"]);

					if($_SERVER['REQUEST_METHOD'] === 'POST')
					{
						$ordersql = "INSERT into Orders(accountID, partID, orderDate, partQuantity) VALUES('$accountID','$partNumber','$requiredDate', '$partQuantity')";
				//	        echo "$ordersql";
					        $result = $pdo->query($ordersql);

				                echo "<script>alert('Password Correct. Your RFQ was accepted')</script>";

						//going back to the main page
				                echo "<script>window.location = 'http://students.cs.niu.edu/~cs56711/main.php'</script>";
					}
				}
				else
				{
					echo "<script>alert('Password Incorrect. Please try again')</script>";
				}

			}
		?>
	</body>
</html>
