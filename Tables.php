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

session_start();
if(isset($_SESSION['ID'])){
    $userID= $_SESSION['ID'];
}
if(isset($_SESSION['userlist'])){
    $userlist= $_SESSION['userlist'];
}

$table = mysqli_query($con, "SELECT * FROM Main WHERE toID = $userID");
	if (!$table){
		echo 'Could not run query: ' . mysql_error();
	}else{	
		if (mysqli_num_rows($table) > 0) {
		  echo "<table cellpadding=10 border=1>";
		  while($row = mysqli_fetch_assoc($table)) {
		  	echo "<tr>";
       			echo "<td>".$userlist[$row['fromID']]."</td>";
       			echo "<td>".$row['description']."</td>";
        		echo "<td>".$row['amount']."</td>";
        		echo "<td>".$row['balance']."</td>";
       			echo "<td>".$row['date']."</td>";
        	echo "</tr>";

		  }
		   echo "</table>";
		}else{
			echo "you have no debts!";
		}
	}
?>

<?php

// include the page footer

include('footer.php');

?>