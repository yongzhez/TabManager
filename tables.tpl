{extends file="default.tpl"}
{block name=title}
	Tabs
{/block}
{block name=body}
	{include file='header.tpl'}
	<p>Welcome {$user}</p>
    	{if (!$results)}
    		<p>you have no debts</p>
    	{else}
    		<table cellpadding=10 border=1>
    		<tr>
	    		<td><b>fromID</b></td>
	    		<td><b>description</b></td>
	    		<td><b>amount</b></td>
	    		<td><b>balance</b></td>
	    		<td><b>date</b></td>
	    	</tr>
    		{foreach from=$results key=myID item=i}
    		<tr>
    			<td>{$i.fromID}</td>
    			<td>{$i.description}</td>
    			<td>{$i.amount}</td>
    			<td>{$i.balance}</td>
    			<td>{$i.date}</td>
    		</tr>
    		{/foreach}
    		</table>

    	{/if}
    {include file='footer.tpl'}
{/block}