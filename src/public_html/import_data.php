<?php
/* connect to database */

$dbhost = "acadmysql.duc.auburn.edu";
$dbuser = "user";
$dbpass = "pass";
$dbname = "database";

$connect = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$connect) {
 die('Could not connect to MySQL: ' . mysql_error());
}

$db = mysql_select_db($dbname, $connect);

// path where your CSV file is located
$csvBook = "./data/db_book.csv";
$query = "LOAD DATA LOCAL INFILE '$csvBook'
     INTO TABLE Book
     FIELDS TERMINATED BY ','
     LINES TERMINATED BY '\n' 
     IGNORE 1 LINES 
     (BookID, Title, UnitPrice, Author, Quantity, SupplierID, SubjectID)";

mysql_query($query);

echo "$csvBook data successfully imported to database!!\n";

$csvCustomer = "./data/db_customer.csv";
$query = "LOAD DATA LOCAL INFILE '$csvCustomer'
     INTO TABLE Customer
     FIELDS TERMINATED BY ','
     LINES TERMINATED BY '\n' 
     IGNORE 1 LINES 
     (CustomerID, LastName, FirstName, Phone)";

mysql_query($query);

echo "$csvCustomer data successfully imported to database!!\n";

$csvEmployee = "./data/db_employee.csv";
$query = "LOAD DATA LOCAL INFILE '$csvEmployee'
     INTO TABLE Employee
     FIELDS TERMINATED BY ','
     LINES TERMINATED BY '\n' 
     IGNORE 1 LINES 
     (EmployeeID, LastName, FirstName)";

mysql_query($query);

echo "$csvEmployee data successfully imported to database!!\n";

$csvOrders = "./data/db_order.csv";
$query = "LOAD DATA LOCAL INFILE '$csvOrders'
     INTO TABLE Orders
     FIELDS TERMINATED BY ','
     LINES TERMINATED BY '\n' 
     IGNORE 1 LINES 
     (OrderID, CustomerID, EmployeeID, OrderDate, ShippedDate, ShipperID)";

mysql_query($query);
echo "$csvOrder data successfully imported to database!!\n";

$csvOrderDetail = "./data/db_order_detail.csv";
$query = "LOAD DATA LOCAL INFILE '$csvOrderDetail'
     INTO TABLE OrderDetail
     FIELDS TERMINATED BY ','
     LINES TERMINATED BY '\n' 
     IGNORE 1 LINES 
     (BookID, OrderID, Quantity)";

mysql_query($query);

echo "$csvOrderDetail data successfully imported to database!!\n";

$csvShipper = "./data/db_shipper.csv";
$query = "LOAD DATA LOCAL INFILE '$csvShipper'
     INTO TABLE Shipper
     FIELDS TERMINATED BY ','
     LINES TERMINATED BY '\n' 
     IGNORE 1 LINES 
     (ShipperID, ShipperName)";

mysql_query($query);

echo "$csvShipper data successfully imported to database!!\n";

$csvSubject = "./data/db_subject.csv";
$query = "LOAD DATA LOCAL INFILE '$csvSubject'
     INTO TABLE Subject
     FIELDS TERMINATED BY ','
     LINES TERMINATED BY '\n' 
     IGNORE 1 LINES 
     (SubjectID, CategoryName)";

mysql_query($query);

echo "$csvSubject data successfully imported to database!!\n";


$csvSupplier = "./data/db_supplier.csv";
$query = "LOAD DATA LOCAL INFILE '$csvSupplier'
     INTO TABLE Supplier
     FIELDS TERMINATED BY ','
     LINES TERMINATED BY '\n' 
     IGNORE 1 LINES 
     (SupplierID, CompanyName, ContactLastName, ContactFirstName, Phone)";

mysql_query($query);

echo "$csvSupplier data successfully imported to database!!\n";


mysql_close($connect);

?>
