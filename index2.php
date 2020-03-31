<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";
$conn = mysqli_connect($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <div class="container">
    <form style="font-size: 20px;">
      <b>Division:</b>
      <select class="form-control" onchange="myfun(this.value)">
        <option>Select Any One</option>
        <?php
        $sql = "select * from division";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

 ?>
 <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
        
<?php }
}
?>
<?php 
  $conn->close();
 ?>
        
      </select><br><br>

    </form>

    <div id="txtHint"></div>
    
  </div>

  <script type="text/javascript">
   function myfun(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "getcity.php?q="+str, true);
  xhttp.send();
}

  </script>

</body>
</html>