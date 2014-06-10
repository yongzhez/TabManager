<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-09 21:29:54
         compiled from "template/tables.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66753570253965ea51d1fc3-84558900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9641925fea484d53882f038a528ea1291b7ec286' => 
    array (
      0 => 'template/tables.tpl',
      1 => 1402363553,
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
  'nocache_hash' => '66753570253965ea51d1fc3-84558900',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_53965ea51f3a35_08628368',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53965ea51f3a35_08628368')) {function content_53965ea51f3a35_08628368($_smarty_tpl) {?>
<html>
	<head>
		<title>
	Tabs
</title>
	</head>
	<body>
		
	<?php /*  Call merged included template "template/header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('template/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '66753570253965ea51d1fc3-84558900');
content_53965f92469688_69476050($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "template/header.tpl" */?>
	<p>Welcome <?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</p>
    	<?php if ((!$_smarty_tpl->tpl_vars['results']->value)){?>
    		<p>you have no debts</p>
    	<?php }else{ ?>
    		<table cellpadding=10 border=1>
    		<tr>
	    		<td><b>fromID</b></td>
	    		<td><b>description</b></td>
	    		<td><b>amount</b></td>
	    		<td><b>balance</b></td>
	    		<td><b>date</b></td>
	    	</tr>
    		<?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_smarty_tpl->tpl_vars['myID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['results']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
 $_smarty_tpl->tpl_vars['myID']->value = $_smarty_tpl->tpl_vars['i']->key;
?>
    		<tr>
    			<td><?php echo $_smarty_tpl->tpl_vars['i']->value['fromID'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['i']->value['description'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['i']->value['amount'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['i']->value['balance'];?>
</td>
    			<td><?php echo $_smarty_tpl->tpl_vars['i']->value['date'];?>
</td>
    		</tr>
    		<?php } ?>
    		</table>

    	<?php }?>
    <?php /*  Call merged included template "template/footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('template/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '66753570253965ea51d1fc3-84558900');
content_53965f9247a322_18990007($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "template/footer.tpl" */?>

	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-09 21:29:54
         compiled from "template/header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53965f92469688_69476050')) {function content_53965f92469688_69476050($_smarty_tpl) {?><table width="90%" border="1" cellspacing="5" cellpadding="5">

<tr>

<td><a href="../signin.php">Tables</a></td>

<td><a href="../newtab.php">New Record</a></td>


</tr>

</table><?php }} ?><?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-09 21:29:54
         compiled from "template/footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_53965f9247a322_18990007')) {function content_53965f9247a322_18990007($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/usr/share/php/smarty3/plugins/modifier.date_format.php';
?><br />
<center> Data is copyright Jason Zheng, <?php echo smarty_modifier_date_format(time());?>

</center><?php }} ?>