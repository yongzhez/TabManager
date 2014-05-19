<html>
<body>

<?php
$con=mysqli_connect("127.0.0.1","Reader","test", "learn_sql");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = mysqli_real_escape_string($con, $_POST['user']);
$pass = mysqli_real_escape_string($con, $_POST['pass']);

$sql="INSERT INTO users (Username, Password)
    VALUES ('$user', '$pass')";
if (!mysqli_query($con,$sql)) {
  die('Error: ' . mysqli_error($con));
}


echo "record added , $user";
?>

</body>
</html>