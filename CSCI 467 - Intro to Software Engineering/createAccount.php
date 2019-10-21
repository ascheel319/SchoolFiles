<!DOCTYPE html>
<html>
	<head><title>Create New Customer Account</title>
		<link rel="stylesheet" type="text/css" href="accountStyle.css">
	</head>

	<body>
		<div class="title">Create New Customer Account</div>
		<?php
			include 'login.php';
			try
			{
				$dsn = "mysql:host=courses;dbname=cs56711";
				$pdo = new PDO($dsn, $username, $password);

				$startsql = "INSERT into Customers(firstName) values('a')";
				$result = $pdo->query($startsql);

				$sql = "SELECT MAX(accountID) FROM Customers";
				$value = $pdo->query($sql);
			}
			catch(PDOexception $e)
			{
				echo "Connection to database failed: " . $e->getMessage();
			}
		?>

		<form style="clear:" name="theForm" method="post">
			<fieldset style="clear:" class="accountForm">
				<h1 align="center">Acccount Information</h1>
				<p>
					<label for="accountNumber">Account Number: </label>
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
					<label for="accountPassword">(*)Account Password: </label>
					<input type="password" name="accountPassword" size="50" required>
					<br>
				</p>
				<p>
                                        <label for="customerName">(*)Customer Name: </label>
                                        <input type="type" name="customerName" size="50" required>
                                        <br>
                                </p>
				<label>Account Type:</label>
				<input type="radio" name="quote" value="Auto" checked="checked">Auto Quote
				<input type="radio" name="quote" value="Manual">Manual
				<br>

			</fieldset>
				<br>
			<fieldset style="clear:" class="repForm">
				<h1 align="center">Representative Information</h1>
				<p>
                                        <label for="repFullName">(*)Representative Full Name: </label>
                                        <input type="type" name="repFullName" size="50" required>
                                        <br>
                                </p>
                                <p>
                                        <label for="repEmail">(*)Representative Email: </label>
                                        <input type="type" name="repEmail" size="50" required>
                                        <br>
                                </p>
                                <p>
                                        <label for="repPhone">(*)Representative Phone Number:</label>
                                        <input type="type" name="repPhone" size="50" required pattern="[0-9]{10}">
                                        <br>
                                </p>
			</fieldset>
			<fieldset style="clear:" class="sAddressForm">
				<h1 align="center">Shipping Address</h1>
                	        <p>
                	                <label id="shipping1" for="shippingAddress1">(*)Address 1: </label><input type="text" name="shippingAddress1" size="50" required>
                                        <br>
                	        </p>
                	        <p>
                	                <label for="shippingAddress2">Address 2: </label><input type="text" name="shippingAddress2" size="50">
                                        <br>
                	        </p>
                	        <p>
                	                <label for="shippingState">(*)State: </label>
                	                        <select name="shippingState" required>
                	                                <option value="Default" selected="selected"></option>
                        	                        <option value="AL">AL</option>
                                	                <option value="AK">AK</option>
                                        	        <option value="AR">AR</option>
                                                	<option value="AZ">AZ</option>
	                                                <option value="CA">CA</option>
	                                                <option value="CO">CO</option>
	                                                <option value="CT">CT</option>
	                                                <option value="DC">DC</option>
	                                                <option value="DE">DE</option>
        	                                        <option value="FL">FL</option>
                	                                <option value="GA">GA</option>
                        	                        <option value="HI">HI</option>
                                	                <option value="IA">IA</option>
                                        	        <option value="ID">ID</option>
                                                	<option value="IL">IL</option>
	                                                <option value="IN">IN</option>
	                                                <option value="KS">KS</option>
	                                                <option value="KY">KY</option>
	                                                <option value="LA">LA</option>
	                                                <option value="MA">MA</option>
	                                                <option value="MD">MD</option>
	                                                <option value="ME">ME</option>
        	                                        <option value="MI">MI</option>
                	                                <option value="MN">MN</option>
                        	                        <option value="MO">MO</option>
                                	                <option value="MS">MS</option>
                                        	        <option value="MT">MT</option>
	                                                <option value="NC">NC</option>
	                                                <option value="NE">NE</option>
	                                                <option value="NH">NH</option>
	                                                <option value="NJ">NJ</option>
        	                                        <option value="NM">NM</option>
                	                                <option value="NV">NV</option>
                        	                        <option value="NY">NY</option>
                                	                <option value="ND">ND</option>
                                        	        <option value="OH">OH</option>
                                                	<option value="OK">OK</option>
	                                                <option value="OR">OR</option>
        	                                        <option value="PA">PA</option>
                	                                <option value="RI">RI</option>
                        	                        <option value="SC">SC</option>
                                	                <option value="SD">SD</option>
                                        	        <option value="TN">TN</option>
                                                	<option value="TX">TX</option>
                                                	<option value="UT">UT</option>
                                                	<option value="VT">VT</option>
                                                	<option value="VA">VA</option>
                                                	<option value="WA">WA</option>
                                                	<option value="WI">WI</option>
                                                	<option value="WV">WV</option>
                                                	<option value="WY">WY</option>
                                        	</select>
                                        <br>
                		</p>
                		<p>
                        	        <label for="shippingZipCode">(*)Zip Code: </label><input type="text" name="shippingZipCode" size="3" required pattern="[0-9]{5}">
                        	        <br>
	               		</p>
	                	<p>
                        	        <label for="shippingCity">(*)City: </label><input type="text" name="shippingCity" size="50" required>
                        	        <br>
	                	</p>

		</fieldset><fieldset style="clear:" class="bAddressForm">
				<h1 align="center">Billing Address</h1>

                        	<input type="checkbox" onclick="setBilling(this.form)"> Same as Shipping

	                        <p>
	                                <label id="billing1" for="billingAddress1">(*)Address 1: </label><input type="text" name="billingAddress1" size="50" required>
                                        <br>
        	                </p>
        	                <p>
        	                         <label id="billing2" for="billingAddress2">Address 2: </label><input type="text" name="billingAddress2" size="50">
                                        <br>
        	                </p>
                	        <p>
                	                <label id="bState" for="billingState">(*)State: </label>
                                        <select name="billingState" required>
                                                <option value="Default" selected="selected"></option>
                                                <option value="AL">AL</option>
                                                <option value="AK">AK</option>
                                                <option value="AR">AR</option>
                                                <option value="AZ">AZ</option>
                                                <option value="CA">CA</option>
                                                <option value="CO">CO</option>
                                                <option value="CT">CT</option>
                                                <option value="DC">DC</option>
                                                <option value="DE">DE</option>
                                                <option value="FL">FL</option>
                                                <option value="GA">GA</option>
                                                <option value="HI">HI</option>
                                                <option value="IA">IA</option>
                                                <option value="ID">ID</option>
                                                <option value="IL">IL</option>
                                                <option value="IN">IN</option>
                                                <option value="KS">KS</option>
                                                <option value="KY">KY</option>
                                                <option value="LA">LA</option>
                                                <option value="MA">MA</option>
                                                <option value="MD">MD</option>
                                                <option value="ME">ME</option>
                                                <option value="MI">MI</option>
                                                <option value="MN">MN</option>
                                                <option value="MO">MO</option>
                                                <option value="MS">MS</option>
                                                <option value="MT">MT</option>
                                                <option value="NC">NC</option>
                                                <option value="NE">NE</option>
                                                <option value="NH">NH</option>
                                                <option value="NJ">NJ</option>
                                                <option value="NM">NM</option>
                                                <option value="NV">NV</option>
                                                <option value="NY">NY</option>
                                                <option value="ND">ND</option>
                                                <option value="OH">OH</option>
                                                <option value="OK">OK</option>
                                                <option value="OR">OR</option>
                                                <option value="PA">PA</option>
                                                <option value="RI">RI</option>
                                                <option value="SC">SC</option>
                                                <option value="SD">SD</option>
                                                <option value="TN">TN</option>
                                                <option value="TX">TX</option>
                                                <option value="UT">UT</option>
                                                <option value="VT">VT</option>
                                                <option value="VA">VA</option>
                                                <option value="WA">WA</option>
                                                <option value="WI">WI</option>
                                                <option value="WV">WV</option>
                                                <option value="WY">WY</option>
                                        </select>
                                        <br>
                		</p>
                		<p>
                        	        <label for="billingZipCode">(*)Zip Code: </label><input type="text" name="billingZipCode" size="3" required pattern="[0-9]{5}">
                                        <br>
                		</p>
                		<p>
                        	        <label for="billingCity">(*)City: </label><input type="text" name="billingCity" size="50" required>
                                        <br>
                		</p>

			</fieldset>
                        <br>
<div class="buttons">                        <button class="button" onclick="window.location.href = 'main.php';">Go Back</button>
                        <input class="button" type="reset" name="reset" value="Clear"></input>
                        <input class="button" type="submit" name="submit"value="Submit"></input>
      </div>          </form>


		<!--JavaScript functions?-->

		<script>
		        function setBilling(f)
	       		{
	        	        f.billingAddress1.value = f.shippingAddress1.value;
	        	        f.billingAddress2.value = f.shippingAddress2.value;
	        	        f.billingState.value = f.shippingState.value;
	        	        f.billingZipCode.value = f.shippingZipCode.value;
	        	        f.billingCity.value = f.shippingCity.value;
	        	}

		</script>
		<?php
			$accountNumber = $id - 1;
			$accountPassword = @($_POST["accountPassword"]);


			$repName = @($_POST["repFullName"]);
			$custName = @($_POST["customerName"]);
			$repName = @($_POST["repFullName"]);//in seller
			$repEmail = @($_POST["repEmail"]);//in seller
			$repPhone = @($_POST["repPhone"]);//in seller
			$accountType = @($_POST["quote"]);

			$sAddress1 = @($_POST["shippingAddress1"]);
		        $sAddress2 = @($_POST["shippingAddress2"]);

			$sAddress = $sAddress1." ".$sAddress2;

		        $sState = @($_POST["shippingState"]);
		        $sZipCode = @($_POST["shippingZipCode"]);
		        $sCity = @($_POST["shippingCity"]);

		        $bAddress1 = @($_POST["billingAddress1"]);
		        $bAddress2 = @($_POST["billingAddress2"]);

			$bAddress = $bAddress1." ".$bAddress2;

		        $bState = @($_POST["billingState"]);
		        $bZipCode = @($_POST["billingZipCode"]);
		        $bCity = @($_POST["billingCity"]);


			$sql = "UPDATE Customers SET street = '$sAddress', city = '$sCity', state = '$sState', zipcode = '$sZipCode', billingStreet = '$bAddress', billingCity = '$bCity', billingState = '$bState', billingZipCode = '$bZipCode', cutomerPassword = '$accountPassword', firstName = '$custName', lastName = '$repName', accountType = '$accountType' WHERE accountID = '$accountNumber'";
			$result = $pdo->query($sql);

			$sql = "INSERT into Seller(customerRepFname, customerRepEmail, customerRepPhoneNumber) values ('$repName', '$repEmail', '$repPhone')";
			$result = $pdo->query($sql);
			if($_SERVER['REQUEST_METHOD'] === 'POST')
			{
				echo "<script>alert('Your RFQ was successfully made. You will now be taken back to the main page.')</script>";
				echo "<script>window.location = 'http://students.cs.niu.edu/~cs56711/main.php'</script>";
			}
		?>
	</body>
</html>
