<html>
	<head>
	<title>COMP 5120</title>
	<style>
	table {
    		width:100%;
	}
	table, th, td {
    		border: 1px solid black;
    		border-collapse: collapse;
	}
	th, td {
    		padding: 5px;
    		text-align: left;
	}
	table#style1 tr:nth-child(even) {
    		background-color: #eee;
	}
	table#style1 tr:nth-child(odd) {
   		background-color:#fff;
	}
	table#style1 th	{
    		background-color: black;
    		color: white;
	}
	
	</style>
	</head>
	
	<body>
		<form action="index.php" method="post">
			<input type="submit" name="Book" value="Book">
			<input type="submit" name="Customer" value="Customer">
			<input type="submit" name="Employee" value="Employee">
			<input type="submit" name="Orders" value="Orders">
			<input type="submit" name="OrderDetail" value="OrderDetail">
			<input type="submit" name="Shipper" value="Shipper">
			<input type="submit" name="Subject" value="Subject">
			<input type="submit" name="Supplier" value="Supplier">
	<?php
		
		if(isset($_POST['Book'])) {
		
			bookTable();
			
		}
		else if(isset($_POST['Customer'])) {
			
			customerTable();
			
		}
		else if(isset($_POST['Employee'])) {
			
			employeeTable();
			
		}
		else if(isset($_POST['Orders'])) {
			
			ordersTable();
			
		}
		else if(isset($_POST['OrderDetail'])) {
			
			orderDetailTable();
			
		}
		else if(isset($_POST['Shipper'])) {
			
			shipperTable();
			
		}
		else if(isset($_POST['Subject'])) {
			
			subjectTable();
			
			}
		else if(isset($_POST['Supplier'])) {
			
			supplierTable();
			
		}
		
		if(isset($_POST['Submit'])) {
			$sqlCommand = str_replace("\\", "", $_POST['sqlCommand']);
			execute($sqlCommand);
		}
	?>

	<br><br><h2>Enter SQL Command:</h2>
	<textarea cols="50" rows="10" name="sqlCommand"></textarea>
	<input type="submit" name="Submit" value="Submit">
	</br></br></br>

		</form>
	</body>
</html>

	<?php
	function execute($query){
		$mysqli = new mysqli("acadmysql.duc.auburn.edu", "user", "pass");
    		if(!$mysqli) {
        		die();
    		}
    		mysqli_select_db($mysqli, "database");
    		if(!$mysqli) {
        		die();
    		}
    		if (!($res = $mysqli->query($query))) {
        		if($mysqli) $mysqli->close();
        		return;
    		}
    		echo "<table id='style1'>";	
 
    		// Print the table's header row
    		$numFields = $mysqli->field_count;
    		echo "<tr>";
    		$finfo = $res->fetch_fields();
    		foreach ($finfo as $val) {
        		echo "<th>" . $val->name . "</th>";
    		}
    		echo "</tr>";
 
    		// Print each row
    		$i = 0;
    		while($row = $res->fetch_row()){
        		echo "<tr";
        		if ($i % 2 == 0)
            		echo " bgcolor=\"#CCCCCC\"";
        		echo ">";
 
        		for($j = 0; $j < $numFields; $j++){
            			echo "<td>" . $row[$j] . "</td>";
        		}
 
        		echo "</tr>";
        		$i++;
    		}
 
    		echo "</table><br/><br/>";	
 
    		// Free resources
    		if($res) $res->free(); 		
    		if($mysqli) $mysqli->close(); 	
	}

		
		/*Print out Book table*/
		function bookTable(){
			$sql = "SELECT * FROM Book";
			execute($sql);
				
		}

		/*Print out Customer table*/
		function customerTable(){
			$sql = "SELECT * FROM Customer";
			execute($sql);
		}

		/*Print out Employee table*/
		function employeeTable(){
			$sql = "SELECT * FROM Employee";
			execute($sql);
		}
		
		/*Print out Orders table*/
		function ordersTable(){
			$sql = "SELECT * FROM Orders";
			execute($sql);
		}
		
		/*Print out OrderDetail table*/
		function orderDetailTable(){
			$sql = "SELECT * FROM OrderDetail";
			execute($sql);
		}
		
		/*Print out Shipper table*/
		function shipperTable(){
			$sql = "SELECT * FROM Shipper";
			execute($sql);
		}

		/*Print out Subject table*/
		function subjectTable(){
			$sql = "SELECT * FROM Subject";
			execute($sql);
		}

		/*Print out Supplier table*/
		function supplierTable(){
			$sql = "SELECT * FROM Supplier";
			execute($sql);
		}

	?>
