<?php

try{

	require 'smarty3/Smarty.class.php';

	include('../extras/con.php');

	$smarty = new Smarty;

	if (isset($_POST['user']) && isset($_POST['pass'])){

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
			$smarty->display('template/signin.tpl');
			exit;
			//Check for username again.
		}else{
			session_start();
			$_SESSION['ID'] = $userID; // store session data
			$_SESSION['userlist'] = $userlist;
			$_SESSION['name'] = $user;
			$transfer = 1;
			startup($userID, $userlist, $smarty);
		}

	}else{
		session_start();
		$userID = $_SESSION['ID'];
		$userlist= $_SESSION['userlist'];
		$user = $_SESSION['name'];
		$transfer = 0;
		startup($userID, $userlist, $smarty);
	}
}

catch(PDOException $e)
{
	echo $e->getMessage();
}
function startup($userID, $userlist, $smarty){

	global $user, $con;
	$smarty->assign('user', $user);//stores the name to be displayed

	$result = $con->prepare('SELECT * FROM Main
		WHERE toID = ?');
	$result->execute(array($userID));
	$rows = $result->fetchAll(PDO::FETCH_ASSOC);
	$n = $result->rowCount();
	// Information to be returned to the template
	$return = array();
	$i=0;

	if ($n > 0) {
		foreach($rows as $row) {
			$tmp = array(
				'fromID'=>$userlist[$row['fromID']],
				'description'=>$row['description'],
				'amount'=>$row['amount'],
				'balance'=>$row['balance'],
				'date'=>$row['date']
			);

			$return[$i++]=$tmp;

		}
	}
	$smarty->assign('results', $return);
	$smarty->display('template/tables.tpl');
	exit;
}

?>
