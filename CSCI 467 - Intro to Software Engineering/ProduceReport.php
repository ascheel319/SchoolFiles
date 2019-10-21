
<html>
		
        <head><title>Produce Report</title>
		<link rel="stylesheet" href="ProduceReportCSS.css" type="text/css"/>
                       
        </head>
        <body><center><b>Produce Report</b><br><br><br></center>
		
		<?php
					
					
					require 'login.php';
					include 'CheckboxForm.php';
					require 'sortByDates.php';							
					try{
					
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select * from userChoice";
									$statement = $conn->query($sql);
									$result = $statement->fetch();
									//select first user Date from database
									$sql2 = "select date from userChoice";
									$statement2 = $conn->query($sql2);
									$date1 = $statement2->fetch();
									
									//select second date from database
									$sql3 = "select date2 from userChoice";
									$statement3 = $conn->query($sql3);
									$date2 = $statement3->fetch();
									
					}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
					?>
						
				<?php
						require 'login.php';
						include 'CheckboxForm.php';
						
							
						if($result[0] == ''){ ?>
						<div class="row">
						<div class="column"><b>Name</b>
												
						
				<?php 
						
						try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select Customers.firstName from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID  where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
										 									
									
									while($Names=$statement->fetch()){
										 
										 echo "<br>";
										 echo $Names[0];
										 echo "<br>";
										
	
										}
										
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						
					
					?>
					</div>
					
					<div class="column"><b>Part ID</b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								
									$sql = "select Parts.partID from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
					?>
					</div>
					
				
					<div class="column"><b>Part Name</b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select Parts.partName from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where Orders.orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									
									
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										}									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
					?>
					</div>
					
					<div class="column"><b>Manufacturer Name </b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select  mName from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName" ;
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
					?>
					</div>
					
					<div class="column"><b>Part Price </b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select partPrice from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName ";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						
					
					?>
					</div>
					<div class="column"><b>Order Date </b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select orderDate from Orders join Customers on Customers.accountID = Orders.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						

					?>
					</div>
					
					<div class="column"><b>Part Quantity</b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select partQuantity from Orders join Customers on Customers.accountID = Orders.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						}

					?>
					</div>

				</div>
				<?php
						require 'login.php';
						include 'CheckboxForm.php';
						
						if($result[0] == 'partID'){ ?>
						<div class="row">
						<div class="column"><b>Name</b>
												
						
				<?php 
									try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select Customers.firstName from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						
						
					?>
					</div>
					
					
					<div class="column"><b>Part ID</b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select Parts.partID from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
					
						

					?>
					</div>
					
					<div class="column"><b>Part Price </b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select partPrice from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						
					
					?>
					</div>
					<div class="column"><b>Order Date </b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select orderDate from Orders join Customers on Customers.accountID = Orders.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						

					?>
					</div>
					<div class="column"><b>Part Quantity</b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select partQuantity from Orders join Customers on Customers.accountID = Orders.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						}

					?>
					</div>
					<?php
						require 'login.php';
						include 'CheckboxForm.php';
						
						if($result[0] == 'partName'){ ?>
						<div class="row">
						<div class="column"><b>Name</b>
												
						
				<?php 
									try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select Customers.firstName from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						
						
					?>
					</div>
					<div class="column"><b>Part Name</b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select Parts.partName from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
					
						
					
					?>
					</div>
					<div class="column"><b>Part Price </b>						
					
					<?php
								try
                        	        {
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select partPrice from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
									
								
					?>
					</div>
					<div class="column"><b>Order Date </b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select orderDate from Orders join Customers on Customers.accountID = Orders.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						

					?>
					</div>
					<div class="column"><b>Part Quantity</b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select partQuantity from Orders join Customers on Customers.accountID = Orders.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						}

					?>
					</div>
					<?php
						require 'login.php';
						include 'CheckboxForm.php';
						
						if($result[0] == 'mName'){ ?>
						<div class="row">
						<div class="column"><b>Name</b>
												
						
				<?php 
									try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select Customers.firstName from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						
						
					?>
					</div>
					<div class="column"><b>Manufacturer Name </b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select  mName from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						
						
					?>
					</div>
					<div class="column"><b>Part Price </b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select partPrice from Customers join Orders on Orders.accountID = Customers.accountID join Parts on Parts.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
									
								
					?>
					</div>
					<div class="column"><b>Order Date </b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select orderDate from Orders join Customers on Customers.accountID = Orders.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						

					?>
					</div>
					<div class="column"><b>Part Quantity</b>						
					
					<?php
								try
                        	        {
                        	      
									
									$conn = new PDO("mysql:host=courses;dbname=cs56711", $username, $password);
									$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
									
									$sql = "select partQuantity from Orders join Customers on Customers.accountID = Orders.accountID join Parts on Parts.partID = Orders.partID join Manufacturers on Manufacturers.partID = Orders.partID where orderDate between '$date1[0]' and '$date2[0]' order by Customers.firstName";
									$statement = $conn->query($sql);
									
									while($results=$statement->fetch()){
										echo "<br>";
										 echo $results[0];
										 echo "<br>";
										
	
										}
									
									}
									catch(PDOException $e)
									{
									echo "Connection failed: " . $e->getMessage();
									}
						}

					?>
						</div>
					</div>
					<br>
					<button class="button" onclick="window.location.href = 'main.php';">Go Home</button>
					<button class="button" onclick="window.location.href = 'GenerateReport.php';">Go Back</button>
					
					
				
					
					
	