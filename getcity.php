<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_GET['q'];
$sql = "SELECT * FROM city WHERE did = $id";

$result = $conn->query($sql);
echo "<b>City:</b>
 <br>";

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

 ?>
 <ul>
 	<li><?php echo $row['name']; ?></li>
 </ul>
        
<?php }
}
?>
<?php 
  $conn->close();
 ?>