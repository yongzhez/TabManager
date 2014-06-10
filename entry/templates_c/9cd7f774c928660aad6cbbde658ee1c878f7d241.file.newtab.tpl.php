<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-08 18:33:34
         compiled from "newtab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:238801265394e17b5bcb17-49686621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9cd7f774c928660aad6cbbde658ee1c878f7d241' => 
    array (
      0 => 'newtab.tpl',
      1 => 1402266737,
      2 => 'file',
    ),
    '37436440dccbb30d79186a70bea24813fbec1ea9' => 
    array (
      0 => 'default.tpl',
      1 => 1402184831,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '238801265394e17b5bcb17-49686621',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5394e17b5d9754_99305820',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5394e17b5d9754_99305820')) {function content_5394e17b5d9754_99305820($_smarty_tpl) {?>
<html>
	<head>
		<title>
	Tabs
</title>
	</head>
	<body>
		
	<form action="newtab.php" method="post">
	ower: <input type="text" name="toID">
	amount: <input type="text" name="amount"><br>
	desc: <textarea name="desc" rows="1" cols="40"></textarea><br>
	type:<input type="radio" name="type" value="pay">payment
		<input type="radio" name="type" value="debt">debt<br>
	<input type="submit" name="submit" value="Go">
	<?php if ($_smarty_tpl->tpl_vars['booluser']->value){?>
		<br>incorrect user
	<?php }elseif($_smarty_tpl->tpl_vars['booltab']->value){?>
		<br>please choose a tab
	<?php }elseif($_smarty_tpl->tpl_vars['info']->value){?>
		<br>
		<ul>
		<?php  $_smarty_tpl->tpl_vars['foo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['foo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['info']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->key => $_smarty_tpl->tpl_vars['foo']->value){
$_smarty_tpl->tpl_vars['foo']->_loop = true;
?>
    		<li><?php echo $_smarty_tpl->tpl_vars['foo']->value;?>
</li>
		<?php } ?>
		</ul>
	<?php }?>

	</body>
</html><?php }} ?>