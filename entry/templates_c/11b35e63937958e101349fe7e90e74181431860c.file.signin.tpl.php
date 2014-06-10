<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-09 21:30:10
         compiled from "template/signin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:213395825353965fa2e54ad2-19919215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '11b35e63937958e101349fe7e90e74181431860c' => 
    array (
      0 => 'template/signin.tpl',
      1 => 1402363550,
      2 => 'file',
    ),
    '8fe215e57694ea735b1d206dd1191e78553ba6d3' => 
    array (
      0 => 'template/default.tpl',
      1 => 1402184831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213395825353965fa2e54ad2-19919215',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_53965fa2e65bc5_35327952',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53965fa2e65bc5_35327952')) {function content_53965fa2e65bc5_35327952($_smarty_tpl) {?>
<html>
	<head>
		<title>
	Tabs
</title>
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