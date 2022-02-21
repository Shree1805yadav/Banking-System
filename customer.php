<!DOCTYPE html>
<html>
<?php
include("banking_system.php");
?>
<head>
	<title>database</title>
	<style type="text/css">
		table{
			margin-left: auto;
			margin-top: -270px;
			margin-right: auto;
			border-collapse: collapse;
			width:60%;
			color:blue;
			font-family: monospace;
			font-size: 25px;
			text-align: left; 
		}
		th{
			background-color: #0702a6;
			color:white;
		}
		tr:nth-child(even){background-color:  #ccccff;}
		tr:nth-child(odd){background-color:   #ccffff;}
	</style>
</head>
<body>
	<table>
		<tr>
			<th>Sr no</th>
			<th>Name</th>
			<th>Email</th>
			<th>Current Balance</th>
		</tr>
		<?php
		$conn = mysqli_connect("localhost","root","","bank"); 
		$query = "select * from customer";
		$data = mysqli_query($conn,$query);
		$total= mysqli_num_rows($data);
		if($total !=0)
		{
			while($result= mysqli_fetch_assoc($data)){

				echo "<tr><td>" .$result["Sr_no"]. "</td><td>". $result["Name"]."</td><td>".$result["Email"]."</td><td>".$result["Current_balance"]."</td></tr>";
			}
			
		}
		
		else{
			echo "error";
		}
		
		 ?>
		
		
		

	</table>

</body>
</html>