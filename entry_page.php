<?php
    session_start();
    define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)) );
    include(ROOT_PATH.'/pages/default_page.php');


    if (!isset($_SESSION['name']) && !isset($_SESSION['userlist']) && !isset($_SESSION['ID'])){
        $page = new Default_page();
        $page->display_temp('signin.tpl');
    }
try{

    $page = new Default_page();

    if (isset($_POST['user']) && isset($_POST['pass'])){


        $user =  $_POST['user'];
        $pass =  $_POST['pass'];



        $page->assign_user($user);

        $page->create_userlist($page->con);
        if ($page->pass_valid($pass, $page->con) == 1){
            $page->display_temp('signin.tpl');
        } else{

            $_SESSION['ID'] = $page->userid; // store session data
            $_SESSION['userlist'] = $page->userlist;
            $_SESSION['name'] = $page->username;
            
            startup($page);

        }
    } else{

        $page->assign_user($_SESSION['name']);
        $page->assign_userlist( $_SESSION['userlist']);
        $page->assign_userid($_SESSION['ID']);

        startup( $page);
    }

}catch(PDOException $e)
{
    echo $e->getMessage();
}
function startup($page){


    $page->assign('user', $page->username);//stores the name to be displayed

    $result = $page->con->prepare('SELECT * FROM Main
		WHERE toID = ?');
    $result->execute(array($page->userid));
    $rows = $result->fetchAll(PDO::FETCH_ASSOC);
    $n = $result->rowCount();
    // Information to be returned to the template
    $return = array();
    $i=0;

    if ($n > 0) {
        foreach($rows as $row) {
            $tmp = array(
                'fromID'=>$page->userlist[$row['fromID']],
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