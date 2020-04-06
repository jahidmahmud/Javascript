<?php 
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "mydb";
  $conn = new mysqli($servername, $username, $password,$dbname)or die("connection error");