<html>
<body>

<?php
$con=mysqli_connect("127.0.0.1","Reader","test", "learn_sql");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = mysqli_real_escape_string($con, $_POST['user']);
$pass = mysqli_real_escape_string($con, $_POST['pass']);
 
$result= mysqli_query($con, "SELECT * FROM  users WHERE Username='$user'");
while($row = mysqli_fetch_array($result)) {
  echo $row['Username'] . " " . $row['Password'];

	
}


?>

</body>
</html>