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
	if (!isset($fromID)){
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
	$result = mysqli_query($con, "SELECT * FROM Main WHERE fromID = $userID AND toID = $toID")
	  or die ("Error in query: $query " . mysql_error()); 
	$row = mysqli_fetch_array($result); 
	$num_results = mysqli_num_rows($result); 
	if ($num_results > 0){ 
		$balance = $row['balance'] + $amount;
	}else{ 
		$balance = $amount;
	

	} 
	$timezone = date_default_timezone_get();
	date_default_timezone_set($timezone);
	$date = date('m/d/Y h:i:s a', time());
	$insert = mysqli_query($con, "INSERT INTO Main (toID, amount, date, fromID, description, balance) 
		VALUES ('$toID', '$amount', '$date', '$userID', '".$_POST['desc'] ."', '$balance')");
	if (!$insert){
		echo 'Could not run query: ' . mysql_error();
	}
	$_POST=array();
}
?>


<?php

// include the page footer

include('footer.php');

?>