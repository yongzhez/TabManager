<?php

// create an array to set page-level variables
$page = array();

$page['title'] = 'New Record';

/* once the file is imported, the variables set above will become available to it */

// include the page header

include('con.php');
?>

<?php
try{
include('con.php');

?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	ower: <input type="text" name="toID">
	amount: <input type="text" name="amount"><br>
	desc: <textarea name="desc" rows="1" cols="40"></textarea><br>
	type:<input type="radio" name="type" value="pay">payment
		<input type="radio" name="type" value="debt">debt<br>
	<input type="submit" name="submit" value="Go">
<?php
	if(isset($_POST['submit'])){
	session_start();
	if(isset($_SESSION['ID'])){
	    $userID= $_SESSION['ID'];
	    
	    
	}
	if(isset($_SESSION['userlist'])){
	    $userlist= $_SESSION['userlist'];
	    $arrlength= count($userlist);


	}
	foreach ($userlist as $x=>$x_value){
		if ($_POST['toID'] == $x_value){
			$status = 0;
			$toID = $x;
		}else{
			$status = 1;
		}
	}
	if (!isset($toID)){
		echo "there are no users with that name";
		exit;
	}
	if ($_POST['type']== "pay"){
		$amount = -1 * abs($_POST['amount']);
	}if ($_POST['type'] == "debt"){
		$amount = abs($_POST['amount']);
	}elseif (!isset($_POST['type'])){
		echo "please choose type of tab";
		exit;
	}
	$result = $con->prepare("SELECT * FROM Main 
				WHERE fromID = ? AND toID = ?");
	$result->execute(array($userID, $toID));
	$row_count = $result->rowCount();
	/*verify that there is a prexisting balance, if so then 
	we can add to it, if not then create a balance.
	*/
	if ($row_count > 0){
		$row = $result->fetchAll(PDO::FETCH_ASSOC);
		$latest = end($row);
		$balance = $latest['balance'] + $amount;
	}else{ 
		$balance = $amount;
		

	

	} 
	$timezone = date_default_timezone_get();
	date_default_timezone_set($timezone);
	$date = date('m/d/Y h:i:s a', time());


	$insert = $con->prepare( "INSERT INTO Main (toID, amount, date, fromID, description, balance) 
		VALUES (:toID, :amount, :date, :userID, :description, :balance)");
	$insert->execute(array(':toID' => $toID, ':amount' => $amount, ':date' => $date, ':userID' => $userID,
		':description' => $_POST['desc'], ':balance' => $balance));
	
	}
	$_POST=array();
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
