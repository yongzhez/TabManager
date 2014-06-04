<?php
$cred['host'] = 127.0.0.1;
$cred['db'] = 'learn_sql';
$cred['user'] = 'Reader';
$cred['pass'] = 'test';
$con= new PDO("mysql:host= $cred['host']; dbname= $cred['db']", "$cred['user']", "$cred['pass']");

?>