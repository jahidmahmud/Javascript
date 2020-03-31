<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = new mysqli($servername, $username, $password,$dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id=$_POST['datapost'];
//echo "my name";

$sql = "select * from city where did=$id";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

 ?>
 <option><?php echo $row['name']; ?></option>
        
<?php }
}
?>