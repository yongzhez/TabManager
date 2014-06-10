<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-08 18:00:05
         compiled from "signin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203712089453939398e4f7c2-80246772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6b95fd1393689e0c1c451c8e57b4ca5dcbf56996' => 
    array (
      0 => 'signin.tpl',
      1 => 1402264720,
      2 => 'file',
    ),
    '37436440dccbb30d79186a70bea24813fbec1ea9' => 
    array (
      0 => 'default.tpl',
      1 => 1402184831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203712089453939398e4f7c2-80246772',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5393939918d4c1_66363759',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5393939918d4c1_66363759')) {function content_5393939918d4c1_66363759($_smarty_tpl) {?>
<html>
	<head>
		<title>Tabs</title>
	</head>
	<body>
		
		<p>Invalid password or username, please try again. <br></p>
		<form action="signin.php" method="post">
    	Username:<input type="text" name="user">
		Password:<input type="password" name="pass">
		<input type="submit">
    	</form>

	</body>
</html><?php }} ?>