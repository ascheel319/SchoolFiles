<html>
        <head><title>Generate Report</title>

                        <!--Found the calendar drop down here: "http://jqueryui.com/datepicker/#date-range"-->
                        <meta charset="utf-8">
						<meta name="viewport" content="width=device-width, initial-scale=1">
						<title>jQuery UI Datepicker - Select a Date Range</title>
						<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
						<link rel="stylesheet" href="/resources/demos/style.css">
						<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
						<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
						<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
                        <script>
                              $( function() {
						var dateFormat = "mm/dd/yy",
							from = $( "#from" )
								.datepicker({
							defaultDate: "+1w",
							changeMonth: true,
							numberOfMonths: 3
						})
					.on( "change", function() {
					to.datepicker( "option", "minDate", getDate( this ) );
						}),
					to = $( "#to" ).datepicker({
					defaultDate: "+1w",
					changeMonth: true,
					numberOfMonths: 3
				})
					.on( "change", function() {
					from.datepicker( "option", "maxDate", getDate( this ) );
				});
 
				function getDate( element ) {
				var date;
				try {
					date = $.datepicker.parseDate( dateFormat, element.value );
					} catch( error ) {
				date = null;
			}
 
			return date;
				}
			} );
             </script>
        </head>
        <body><center><b>Generate Status Report</b></center>
		
		<div align = "left">
		<div class='text'>
		<span ><strong> Status Report Date</strong> <br>
		<label for="from">From</label>
		<input type="text" id="from" name="from" class="Dates" value = "01/01/19">
		<label for="to">to</label>
		<input type="text" id="to" name="to" class="Dates" value = "12/31/19">
		<div id="dates"></div>
		</div>
			</div>
		<br>				
		</span>
		
		</div>
		<div align = "left">
		<strong>Content</strong>
		<div class='radio'>
		<table>
			<tr> 
		<tr><input type="radio" value="Select All"         name="radio" checked = "Checked" /> Select All 		  </th><br>
		<tr><input type="radio" value="Part ID"    	       name="radio"/> Part ID     	  	  </th><br>
		<tr><input type="radio" value="Part Name"  		   name="radio"/> Part Name     	  </th><br>	  
		<tr><input type="radio" value="mName"  			   name="radio"/> Manufacturer Name   </th><br>
		</div>
		<div id="result"></div>


			
				</table>
					</div>
		

		
			<form method="POST" action="ProduceReport.php">
			<input type="submit" id="submit" name="submit" value="Submit" />
			</form>
			</form>
		</body>
		</html>
		
		<script>  
		$(document).ready(function(){  
      	$('input[type="radio"]').click(function(){  
           var radio = $(this).val();  
           $.ajax({  
                url:"CheckboxForm.php",  
                method:"POST",  
                data:{radio:radio},  
				success:function(data){  
                     $('#result').html(data);  
                }  
           });  
      });  
 });
		$(document).ready(function(){  
		$('#submit').click(function(){  
        var from = $('#from').val();  
        var to = $('#to').val(); 
         ps = "submit";

		$.ajax({  
            url:"sortByDates.php",  
            method:"POST",  
            data:{pageSubmit: ps,from:from, to: to},  
            success:function(data){  
                 $('#dates').html(data);  
            }  
       });  
      });  
 });
	
 </script>
 <script>
	function refreshPage(){
    window.location.reload();
} 
</script>
 
 
<button class="button" onclick="window.location.href = 'main.php';">Go Back</button>

<button type="submit"  onClick="refreshPage()">Clear</button>


						
