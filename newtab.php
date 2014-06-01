<?php

// create an array to set page-level variables
$page = array();

$page['title'] = 'New Record';

/* once the file is imported, the variables set above will become available to it */

// include the page header

include('header.php');

?>

<?php

$con=mysqli_connect("127.0.0.1","Reader","test", "learn_sql");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
	ower: <input type="text" name="fromID">
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
		if ($_POST['fromID'] == $x_value){
			$status = 0;
			$fromID = $x;
		}else{
			$status = 1;
		}
	}
	if (!isset($fromID)){
		echo "there are no users with that name";
	}
	if ($_POST['type']== "pay"){
		$amount = -1 * abs($_POST['amount']);
	}if ($_POST['type'] == "debt"){
		$amount = abs($_POST['amount']);
	}else{
		echo "please choose type of tab";
	}
	$result = mysqli_query($con, "SELECT * FROM Main WHERE toID = $userID")  or die ("Error in query: $query " . mysql_error()); ;
	$row = mysqli_fetch_array($result); 
	$num_results = mysqli_num_rows($result); 
	if ($num_results > 0){ 
		$balance = $_POST['balance'] + $amount;
	}else{ 
		$balance = $amount;

	} 
	$timezone = date_default_timezone_get();
	date_default_timezone_set($timezone);
	$date = date('m/d/Y h:i:s a', time());
	echo ("$fromID, $amount, $date, $userID, ".$_POST['desc'] .", $balance");
	$insert = mysqli_query($con, "INSERT INTO Main (fromID, amount, date, toID, desc, balance) 
		VALUES ('$fromID', '$amount', '$date', '$userID', '".$_POST['desc'] ."', '$balance')");
	if (!$insert){
		echo 'Could not run query: ' . mysql_error();
	}
}
?>


<?php

// include the page footer

include('footer.php');

?>