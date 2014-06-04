<?php

// create an array to set page-level variables
$page = array();

$page['title'] = 'Tables';

/* once the file is imported, the variables set above will become available to it */

// include the page header

include('header.php');

?>


<?php
try{
include('con.php');

$user =  $_POST['user'];
$pass =  $_POST['pass'];


$userlist = array();
$counter = 0;
$correctness = 0;


//creates a list used for matching IDs to usernames for the table
$result= "SELECT * FROM  users ";
foreach($con->query($result) as $row){
	$userlist[$row['ID']]= $row['Username'];
}

$result= $con->prepare('SELECT * FROM  users 
				WHERE Username= ?');
$result->execute(array($user));
$rows = $result->fetchAll(PDO::FETCH_ASSOC);

foreach($rows as $row) {
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
	$result = $con->prepare('SELECT * FROM Main
				 WHERE toID = ?');
	$result->execute(array($userID));
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);
	$n = $result->rowCount();
	

	if ($n > 0) {
	echo "<table cellpadding=10 border=1>";
	foreach($rows as $row) {
		echo "<tr>";
       		echo "<td>".$userlist[$row['fromID']]."</td>";
       		echo "<td>".$row['description']."</td>";
        	echo "<td>".$row['amount']."</td>";
        	echo "<td>".$row['balance']."</td>";
       		echo "<td>".$row['date']."</td>";
        echo "</tr>";
		}
		echo "</table>";
	}else {
		echo "<br>" . "you have no debts!";
		}
	}
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>

<?php

// include the page footer

include('footer.php');

?>