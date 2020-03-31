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
 <option value="1"><?php echo $row['name']; ?></option>
        
<?php }
}
?>
<?php 
  $conn->close();
 ?>
        
      </select><br><br>
      <b>City:</b>
      <select id="dataget">
        <option>
          Select a City
        </option>
      </select>

    </form>
    
  </div>

  <script type="text/javascript">
  function myfun(datavalue){
    $.ajax({
      url: 'mam.php',
      type: 'POST',
      data: { datapost : datavalue },
      success:function(result){
        $('#dataget').html(result);
      }

    });
    /*$.ajax({
      url:'mam.php',
      type:'POST',
      data:{ datapost : datavalue },
      success:function(result){
        $('#dataget').html(result);
      }

    });*/
  }   

  </script>

</body>
</html>