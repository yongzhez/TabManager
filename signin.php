<html>
<body>

<?php
$con=mysqli_connect("127.0.0.1","Reader","test", "learn_sql");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = mysqli_real_escape_string($con, $_POST['user']);
$pass = mysqli_real_escape_string($con, $_POST['pass']);
 
$counter = 0;

$result= mysqli_query($con, "SELECT * FROM  users WHERE Username='$user'");
while($row = mysqli_fetch_array($result)) {
  	echo "welcome " . $row['Username'];
  	$counter ++;
}

if ($counter == 0){
	echo "Invalid password or username, please try again";
	//Check for password and username again.
?>
 	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Username:<input type="text" name="user">
	Password:<input type="password" name="pass">
	<input type="submit">
    </form>
<?php 
}else{
	echo "hello";
}
?>

</body>
</html>