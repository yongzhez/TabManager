{extends file="template/default.tpl"}
{block name=title}
	Tabs
{/block}
{block name=body}
	 {include file='template/header.tpl'}
	<form action="newtab.php" method="post">
	ower: <input type="text" name="toID">
	amount: <input type="text" name="amount"><br>
	desc: <textarea name="desc" rows="1" cols="40"></textarea><br>
	type:<input type="radio" name="type" value="pay">payment
		<input type="radio" name="type" value="debt">debt<br>
	<input type="submit" name="submit" value="Go">
	{if $booluser}
		<br>incorrect user
	{elseif $booltab}
		<br>please choose a tab
	{/if}
	{include file='template/footer.tpl'}
{/block}