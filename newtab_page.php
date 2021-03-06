<?php
include('default_page.php');
include('con.php');

/*
 * page used to add amounts that the person either owes
 * or is owed too
 */

class newtab_page extends Default_page{

	public $toID;

	function __construct(){
		parent::__construct();
	}

	function assign_toID(){
		foreach ($this->userlist as $x=>$x_value){
			if ($_POST['toID'] == $x_value){
				$this->toID = $x;
			}
		}
	}

	function semantic_check(){
		if (!isset($_POST['toID'] )){			// not typing a username
			$this->assign('booluser', 1);
			$this->display('template/newtab.tpl');
			exit;
		}
        if(!in_array(['toId'], $this->userlist)){  //typing in a username that doesn't exist
            $this->assign('booluser', 1);
            $this->display('template/newtab.tpl');
            exit;
        }
        if ($_POST['toID'] == $this->userid){		// for using same ID as the current user.
			$this->assign('booluser', 1);
			$this->display('template/newtab.tpl');
			exit;
		}
		if (!isset($_POST['type'])){	//is for when radio button is not clicked.
			$this->assign('booltab', 1);
			$this->assign('booluser', '');
			$this->display('template/newtab.tpl');
			exit;
		}

	}
	function balance($con){


		if ($_POST['type'] == "debt"){
			$amount = abs($_POST['amount']);
		}elseif ($_POST['type']== "pay"){
			$amount = -1 * abs($_POST['amount']);
		}

		$result = $con->prepare("SELECT * FROM Main
			WHERE fromID = ? AND toID = ?");
		$result->execute(array($this->userid, $this->toID));
		$row_count = $result->rowCount();
		/*verify that there is a prexisting balance, if so then
		we can add to it, if not then create a balance.
		 */
		if ($row_count > 0){
			$row = $result->fetchAll(PDO::FETCH_ASSOC);
			$latest = end($row);
			$balance = $latest['balance'] + $amount;
			return $balance;
		}else{
			$balance = $amount;
			return $balance;
		}
	}
}


try{

	$page = new newtab_page();

	session_start();
	if(isset($_SESSION['ID']) && isset($_SESSION['userlist'])){
		$page->assign_userid($_SESSION['ID']);
		$page->assign_userlist($_SESSION['userlist']);
	}

	if (isset($_POST['submit'])){

		if ($_POST['type'] == "debt"){
			$amount = abs($_POST['amount']);
		}elseif ($_POST['type']== "pay"){
			$amount = -1 * abs($_POST['amount']);
		}

        $page->semantic_check();

        $page->assign_toID($_POST['toID']);

		$balance = $page->balance($con);

		$timezone = date_default_timezone_get();
		date_default_timezone_set($timezone);
		$date = date('m/d/Y h:i:s a', time());

        print_r(array(':toID' => $page->toID, ':amount' => $amount, ':date' => $date, ':userID' => $page->userid,
            ':description' => $_POST['desc'], ':balance' => $balance));

		$insert = $con->prepare( "INSERT INTO Main (toID, amount, date, fromID, description, balance)
			VALUES (:toID, :amount, :date, :userID, :description, :balance)");
		$insert->execute(array(':toID' => $page->toID, ':amount' => $amount, ':date' => $date, ':userID' => $page->userid,
			':description' => $_POST['desc'], ':balance' => $balance));
		$page->assign('info', array( $page->toID, $amount, $date,  $page->userid,
			$_POST['desc'],  $balance));

		$page->assign('booluser', '');
		$page->assign('booltab', '');
		$page->display_temp('template/newtab.tpl');
		$page->clearAllCache();

	} else{
		$page->assign('booluser', '');
		$page->assign('booltab', '');
		$page->display_temp('template/newtab.tpl');
		$page->clearAllCache();
	}

}catch(PDOException $e)
		{
			echo $e->getMessage();
		}

