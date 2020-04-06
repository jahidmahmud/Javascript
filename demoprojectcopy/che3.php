<?php 
  $etype=$_POST['type'];

  $evenue=$_POST['venue'];

  $edate=$_POST['date'];
  $guest=$_POST['noguest'];
  $efood=$_POST['food'];
  $equipments=$_POST['equipment'];
  $ecost=$_POST['cost'];
  $status=2;

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "mydb";
	$conn = new mysqli($servername, $username, $password,$dbname)or die("connection error");
	$sql = "INSERT INTO bookevent (type,venue,date,nog,foods,eequipments,cost,status)
	VALUES ('{$etype}','{$evenue}','{$edate}','{$guest}','{$efood}','{$equipments}','{$ecost}','{$status}')";
	if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "Booking successful.Your booking ID is: " . $last_id;
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
    }
	$conn->close();

 ?>