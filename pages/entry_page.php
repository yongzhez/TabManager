<?php

session_start();
define('ROOT_PATH',$_SESSION['ROOT_PATH']); //you have tp run it frm main.php and enter in info, or else everuthing is in bad

include(ROOT_PATH.'/pages/default_page.php');
include(ROOT_PATH.'/con.php');

//print_r(ROOT_PATH.'/pages/default_page.php');
print("\n");
print_r(getcwd());

/*
 * primary page that is open after a user logs in
 */
try{

	$page = new Default_page(ROOT_PATH);

	if (isset($_POST['user']) && isset($_POST['pass'])){

		$user =  $_POST['user'];
		$pass =  $_POST['pass'];


		$page->assign_user($user);
		$page->create_userlist($con);
		if ($page->validation($pass, $con) == 1){
			$page->display('signin.tpl');
		} else{

			$_SESSION['ID'] = $page->userid; // store session data
			$_SESSION['userlist'] = $page->userlist;
			$_SESSION['name'] = $user;
			startup($page->userid, $page->userlist, $page);

		}
	} else{

		$page->assign_user($_SESSION['name']);
		$page->assign_userlist( $_SESSION['userlist']);
		$page->assign_userid($_SESSION['ID']);
		startup($page->userid, $page->userlist, $page);
	}

}catch(PDOException $e)
		{
			echo $e->getMessage();
		}
function startup($userID, $userlist, $page){

	global $user, $con;
	$page->assign('user', $user);//stores the name to be displayed

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
	$page->assign('results', $return);
	$page->display_temp('tables.tpl');
	exit;
}





