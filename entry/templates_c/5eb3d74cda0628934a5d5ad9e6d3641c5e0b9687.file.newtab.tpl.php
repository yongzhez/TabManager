<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-09 22:07:41
         compiled from "template/newtab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8288519965396673f677560-00343817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5eb3d74cda0628934a5d5ad9e6d3641c5e0b9687' => 
    array (
      0 => 'template/newtab.tpl',
      1 => 1402365882,
      2 => 'file',
    ),
    '8fe215e57694ea735b1d206dd1191e78553ba6d3' => 
    array (
      0 => 'template/default.tpl',
      1 => 1402184831,
      2 => 'file',
    ),
    '435d10930e41bb21c503ce88a0dfdada07016644' => 
    array (
      0 => 'template/header.tpl',
      1 => 1402363785,
      2 => 'file',
    ),
    '93eba9ec02e7a31cffc73eb24f851ab6d425dd9c' => 
    array (
      0 => 'template/footer.tpl',
      1 => 1402265033,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8288519965396673f677560-00343817',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5396673f699a43_20695273',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5396673f699a43_20695273')) {function content_5396673f699a43_20695273($_smarty_tpl) {?>
<html>
	<head>
		<title>
	Tabs
</title>
	</head>
	<body>
		
	 <?php /*  Call merged included template "template/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '8288519965396673f677560-00343817');
content_5396686d38c827_70989022($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "template/header.tpl" */?>
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
	<?php }?>
	<?php /*  Call merged included template "template/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('template/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '8288519965396673f677560-00343817');
content_5396686d391ca0_48213833($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "template/footer.tpl" */?>

	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-09 22:07:41
         compiled from "template/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5396686d38c827_70989022')) {function content_5396686d38c827_70989022($_smarty_tpl) {?><table width="90%" border="1" cellspacing="5" cellpadding="5">

<tr>

<td><a href="../signin.php">Tables</a></td>

<td><a href="../newtab.php">New Record</a></td>


</tr>

</table><?php }} ?><?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-09 22:07:41
         compiled from "template/footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5396686d391ca0_48213833')) {function content_5396686d391ca0_48213833($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/usr/share/php/smarty3/plugins/modifier.date_format.php';
?><br />
<center> Data is copyright Jason Zheng, <?php echo smarty_modifier_date_format(time());?>

</center><?php }} ?>