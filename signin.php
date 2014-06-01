<?php

// create an array to set page-level variables
$page = array();

$page['title'] = 'Tables';

/* once the file is imported, the variables set above will become available to it */

// include the page header

include('header.php');

?>


<?php
$con=mysqli_connect("127.0.0.1","Reader","test", "learn_sql");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$user = mysqli_real_escape_string($con, $_POST['user']);
$pass = mysqli_real_escape_string($con, $_POST['pass']);


$userlist = array();
$counter = 0;
$correctness = 0;


//creates a list used for matching IDs to usernames for the table
$result= mysqli_query($con, "SELECT * FROM  users ");
while($row = mysqli_fetch_array($result)){
	$userlist[$row['ID']]= $row['Username'];
}

$result= mysqli_query($con, "SELECT * FROM  users WHERE Username='$user'");
while($row = mysqli_fetch_array($result)) {
	if (!($row['Password'] == $pass)){
		$correctness ++;
		//check for password again.
	}
	$userID = $row['ID'];
	$username = $row['Username'];
	$counter ++;
}

// there were no users
if ($counter == 0){
	$correctness ++;
}

if ($correctness > 0){
	echo "Invalid password or username, please try again";
	//Check for username again.
?>
 	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Username:<input type="text" name="user">
	Password:<input type="password" name="pass">
	<input type="submit">
    </form>
<?php 
}else{
	session_start(); 
	$_SESSION['ID'] = $userID; // store session data
	$_SESSION['userlist'] = $userlist;
	
	echo "Welcome " . $username;
	$table = mysqli_query($con, "SELECT * FROM Main WHERE toID = $userID");
	if (!$table){
		echo 'Could not run query: ' . mysql_error();
	}else{	
		if (mysqli_num_rows($table) > 0) {
		  echo "<table cellpadding=10 border=1>";
		  while($row = mysqli_fetch_assoc($table)) {
		  	echo "<tr>";
       			echo "<td>".$userlist[$row['fromID']]."</td>";
       			echo "<td>".$row['desc']."</td>";
        		echo "<td>".$row['amount']."</td>";
        		echo "<td>".$row['balance']."</td>";
       			echo "<td>".$row['date']."</td>";
        	echo "</tr>";

		  }
		   echo "</table>";
		}else{
			echo "<br>" . "you have no debts!";
		}
	}
}
?>

<?php

// include the page footer

include('footer.php');

?>