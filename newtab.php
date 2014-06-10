<?php

try{

require 'smarty3/Smarty.class.php';

include('con.php');

$smarty = new Smarty;

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
	if (!isset($toID)){			// typing a username that doesn't exist.
		$smarty->assign('booluser', 1);
		$smarty->display('template/newtab.tpl');
		exit;
	}if ($toID == $userID){		// for using same ID as the current user.
		$smarty->assign('booluser', 1);
		$smarty->display('template/newtab.tpl');
		exit;
	}
	if (!isset($_POST['type'])){	//is for when radio button is not clicked.
		$smarty->assign('booltab', 1);
		$smarty->assign('booluser', '');
		$smarty->display('template/newtab.tpl');
		exit;
	}if ($_POST['type'] == "debt"){
		$amount = abs($_POST['amount']);
	}elseif ($_POST['type']== "pay"){
		$amount = -1 * abs($_POST['amount']);
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
	$smarty->assign('info', array( $toID, $amount, $date,  $userID,
		 $_POST['desc'],  $balance));
	$smarty->assign('booluser', '');
	$smarty->assign('booltab', '');
	$smarty->display('template/newtab.tpl');
	$_POST=array();
	$smarty->clearAllCache();
}else{
	$smarty->assign('booluser', '');
	$smarty->assign('booltab', '');
	$smarty->display('template/newtab.tpl');
	$_POST=array();
	$smarty->clearAllCache();
}
}
catch(PDOException $e)
    {
    echo $e->getMessage();
    }
?>
