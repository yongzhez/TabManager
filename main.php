<!DOCTYPE html>
<html>
<head>
    <title>TabManager</title>
</head>
<body>
<p>Welcome to the trial stage of TabManager, please sign in.</p>
<form action="pages/entry_page.php" method="post">
    Username:<input type="text" name="user">
    Password:<input type="password" name="pass">
    <input type="submit">
</form>
</html>

<?php

    define('ROOT_PATH', str_replace('\\', '/', dirname(__FILE__)) );
    session_start();
    $_SESSION['ROOT_PATH'] = ROOT_PATH;
?>