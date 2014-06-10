<?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-08 18:03:35
         compiled from "tables.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20218310085394dcbf0c0f01-83553337%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e2847b5efabb0696b38dd0027662b9f28428523' => 
    array (
      0 => 'tables.tpl',
      1 => 1402264869,
      2 => 'file',
    ),
    '37436440dccbb30d79186a70bea24813fbec1ea9' => 
    array (
      0 => 'default.tpl',
      1 => 1402184831,
      2 => 'file',
    ),
    'cdc07859828693f2c6b3da2fc9183fc36cce2159' => 
    array (
      0 => 'header.tpl',
      1 => 1402264549,
      2 => 'file',
    ),
    '9314f4f1ba57328fe9b401c39acdb0169f57067f' => 
    array (
      0 => 'footer.tpl',
      1 => 1402265010,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20218310085394dcbf0c0f01-83553337',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5394dcbf0f6f96_07502086',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5394dcbf0f6f96_07502086')) {function content_5394dcbf0f6f96_07502086($_smarty_tpl) {?>
<html>
	<head>
		<title>
	Tabs
</title>
	</head>
	<body>
		
	<?php /*  Call merged included template "header.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20218310085394dcbf0c0f01-83553337');
content_5394ddb74c5606_86889033($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "header.tpl" */?>
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
    <?php /*  Call merged included template "footer.tpl" */
$_tpl_stack[] = $_smarty_tpl;
 $_smarty_tpl = $_smarty_tpl->setupInlineSubTemplate('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0, '20218310085394dcbf0c0f01-83553337');
content_5394ddb74d7db5_98723532($_smarty_tpl);
$_smarty_tpl = array_pop($_tpl_stack); /*  End of included template "footer.tpl" */?>

	</body>
</html><?php }} ?><?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-08 18:03:35
         compiled from "header.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5394ddb74c5606_86889033')) {function content_5394ddb74c5606_86889033($_smarty_tpl) {?><table width="90%" border="0" cellspacing="5" cellpadding="5" border = 1>

<tr>

<td><a href="Tables.php">New Record</a></td>

<td><a href="newtab.php">New Record</a></td>

<td><a href="profile.php">Profile</a></td>

</tr>

</table><?php }} ?><?php /* Smarty version Smarty-3.1-DEV, created on 2014-06-08 18:03:35
         compiled from "footer.tpl" */ ?>
<?php if ($_valid && !is_callable('content_5394ddb74d7db5_98723532')) {function content_5394ddb74d7db5_98723532($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/usr/share/php/smarty3/plugins/modifier.date_format.php';
?><br />
<center> Data is copyright Jason Zheng, 2014-<?php echo smarty_modifier_date_format(time());?>

</center><?php }} ?>