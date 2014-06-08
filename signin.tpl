{extends file="default.tpl"}
{block name=title}
	Tabs
{/block}
{block name=body}
		<p>Invalid password or username, please try again. <br></p>
		<form action="signin.php" method="post">
    	Username:<input type="text" name="user">
		Password:<input type="password" name="pass">
		<input type="submit">
    	</form>
{/block}