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
//echo $str;
foreach ($_POST['item'] as $str) {
	$sql = "SELECT * FROM food WHERE fname ='$str'";
	$result = $conn->query($sql);

  if ($result->num_rows>0) {
    while($row = $result->fetch_assoc()) {
    	$total += intval($row['cost']);
 }
}
}


echo "<p>".$total."</p>";

?>