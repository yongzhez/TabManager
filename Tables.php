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
$con= new PDO('mysql:host=127.0.0.1; dbname=learn_sql', 'Reader', 'test');


session_start();
if(isset($_SESSION['ID'])){
    $userID= $_SESSION['ID'];
}
if(isset($_SESSION['userlist'])){
    $userlist= $_SESSION['userlist'];
}
	$result = $con->prepare('SELECT * FROM Main
				 WHERE toID = ?');
	$result->execute(array($userID));
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);
	$n = $result->rowCount();
	
	if ($n > 0){
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
	}else{
		echo "<br>" . "you have no debts!";
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
