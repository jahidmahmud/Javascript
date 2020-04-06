<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = mysqli_connect($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$total = 0;
$str=$_POST['item'];
//echo $str;
	$sql = "SELECT * FROM venue WHERE name ='$str'";
	$result = $conn->query($sql);

  if ($result->num_rows ==1) {
    while($row = $result->fetch_assoc()) {
    	$total += intval($row['cost']);
 }
}

echo "<p>".$total."</p>";

?>