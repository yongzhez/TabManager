<?php



include(ROOT_PATH.'/pages/wrapper.php');
/**
 * Class Default page
 */

class Default_page extends SmartyWrapper{

    public $password;
	public $username;
	public $userlist;
	public $userid;
    public $con;


	/*
	 *
	 */
	function __construct(){
		parent::__construct();
        $cred = array(
            'host' => '127.0.0.1',
            'db' => 'learn_sql',
            'user' => 'Reader',
            'pass' => 'test',
        );
        $this->con= new PDO('mysql:host='.$cred['host'].'; dbname='.$cred['db'], $cred['user'], $cred['pass']);
	}

	/*
	 * @param string
	 * assigns the username variable
	 */
	function assign_user($username){
		$this->username = $username;
	}

	/*
	 * @param array
	 * assigns the userlist variable
	 */
	function assign_userlist($userlist){
		$this->userlist = $userlist;
	}

	/*
	 * @param array
	 * assigns the userID variable
	 */
	function assign_userid($userID){
		$this->userid = $userID;
	}

	/*
	 * @param PDO object
	 * Returns a simple array containing all of the names
	 */
	function create_userlist($con){
		//creates a list used for matching IDs to usernames for the table
		$result= "SELECT * FROM  users ";
		foreach($con->query($result) as $row){
			$this->userlist[$row['ID']]= $row['Username'];
		}

	}
	/*
	 * @param string
	 * Validates that this is the correct user. Returns a boolean
	 * in the form of 0 or 1.
	 */
	function  pass_valid($pass, $user){

		$counter = 0;
		$correctness = 0;

		$result= $this->con->prepare('SELECT * FROM  users
			WHERE Username= ?');
		$result->execute(array($user));
		$rows = $result->fetchAll(PDO::FETCH_ASSOC);


		foreach($rows as $row) {
			if (!(password_verify($pass, $row['Password']))){
				$correctness ++;
				//check for password again.
			}
			$this->userid = $row['ID'];
            $this->password = $row['Password'];
			$counter ++;

		}

		// there were no users
		if ($counter == 0){
			$correctness ++;
			return $correctness;
		}else{
			return $correctness;
		}

	}
	/*
	 * Creates the table display.
	 */

}

?>
