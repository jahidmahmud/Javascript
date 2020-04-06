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
	<title>
	</title>
	<script src="query.js" type="text/javascript"></script>
  <script type="text/javascript">
    var x="";
    var z="";
    var dt="";
    var nog=1;
    var a;
    var b;
    var et="";
    $(document).ready(function(){
      var totalcost=0;
      $( "#venue" ).change(function() {
      x=$(this).val();
      z=x;
      $.ajax({
            url : "calculation.php",
            method : "POST",
            data : {item: x},
            dataType : "text",
            success: function(data) {
              totalcost+=parseInt($('#cost').html(data).text());
              $('#con').html(totalcost);
            }
          });
});
      $( "#nog" ).change(function() {
      nog=$(this).val();
    });

      $( "#btn1" ).click(function() {
      a = [];
        $('input[name="foods"]:checked').each(function(){
          a.push($(this).val());
          //console.log(a);
        });
        $.ajax({
            url : "che1.php",
            method : "POST",
            data : {item: a},
            dataType : "text",
            success: function(data) {
              totalcost+=parseInt($('#cost').html(data).text())*nog;
              $('#con').html(totalcost);
            }
          });
    });
      $( "#btn2" ).click(function() {
      b = [];
        $('input[name="equipments"]:checked').each(function(){
          b.push($(this).val());
          console.log(b);
        });
        $.ajax({
            url : "che2.php",
            method : "POST",
            data : {item: b},
            dataType : "text",
            success: function(data) {
              totalcost+=parseInt($('#cost').html(data).text());
              $('#con').html(totalcost);
            }
          });
    });

      $( "#dt" ).change(function() {
      dt=$(this).val();
    });
      $( "#event" ).change(function() {
      et=$(this).val();
    });

      $( "#btn" ).click(function() {
        var p=a.toString(); 
        var q=b.toString();
        $.ajax({
            url : "che3.php",
            method : "POST",
            data : {type: et, venue: z,date: dt, noguest: nog,food: p, equipment: q,cost: totalcost},
            dataType : "text",
            success: function(data) {
              alert(data);
            }
          });
    });

     

    });
  </script>
</head>
<body>
	<form id="myform" action="calculation.php" method="post">
<label for="eventtype" style="font-size: 20px">Choose a Event:</label>

<select id="event" name="event">
  <option>choose one</option>
  <option value="marriage">Marriage ceremony</option>
  <option value="birthday">Birthday Party</option>
  <option value="conference">Conference</option>
  <option value="farewell">Farewell Party</option>
</select>
<br><br>
<label for="venue" style="font-size: 20px">Choose a Venue:</label>
<select id="venue" name="venue" >
  <option>choose one</option>
   <?php
        $sql = "select * from venue";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

 ?>
 <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
        
<?php }
}
?>
</select>
<br><br>

<label for="date" style="font-size: 20px">Choose a Date:</label>
<input type="date" name="date" id="dt">
<br><br>
<label for="noguest" style="font-size: 20px">Number of Guest:</label>
<input type="Number" name="guest" id="nog">
<br><br>
<label for="food" style="font-size: 20px">Food:</label>
<?php

$sql = "select * from food";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

 ?>
<input type="checkbox" name="foods" id="food" value="<?php echo $row['fname']; ?>">
 <?php echo $row['fname']; ?>  

<?php }
}
?>
<input type="button" value="Add to Chart" id="btn1" style="height: 30px;width: 120px">
<br><br>
<label for="equipment" style="font-size: 20px">Equipment:</label>
<?php

$sql = "select * from equipment";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

 ?>
<input type="checkbox" name="equipments" id="equipment" value="<?php echo $row['ename']; ?>">
 <?php echo $row['ename']; ?>  

<?php }
}
?>
<input type="button" value="Add to Chart" id="btn2" style="height: 30px;width: 110px">
<br><br>
<label for="cost" style="font-size: 20px">Cost:</label>
<div id="con">

</div>
<br><br>
<input type="hidden" id="cost" name="custId">
<input type="button" value="Book Event" id="btn" style="margin-left: 100px;height: 45px;width: 120px">




	</form>

	<script type="text/javascript"></script>

</body>
</html>