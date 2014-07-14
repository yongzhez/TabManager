{extends file="default.tpl"}
{block name=title}
	Tabs
{/block}
{block name=body}
	 {include file='header.tpl'}
	<form action="newtab_page.php" method="post">
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
    {elseif $boolamount}
        <br>please enter a correct float
	{/if}
	{include file='footer.tpl'}
{/block}