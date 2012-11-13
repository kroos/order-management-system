<?extend ('template/base_template.php')?>

<? startblock('left_menu') ?>
<li><?=anchor('coms/order', 'new order', array('title' => 'new order'))?></li>
<? endblock() ?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Choose your client, if he/she not exist, pls add him/her <?=anchor('coms/client', '<b>here : new client</b>', array('title' => 'new client'))?></p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<table border="0" cellpadding="2" width="100%">
<tr>
<?=form_open()?>
<td>Search Client : <?=form_input(array('name' => 'search', 'size' => '30', 'maxlength' => '30'))?>&nbsp;<?=form_error('search')?>&nbsp;<?=form_submit('search', 'Search')?></td>
<?=form_close()?>
</tr>
</table>
<p>&nbsp;</p>
<table border="0" cellpadding="2" width="100%">
	<tr>
		<td>Delete</td>
		<td>Client</td>
		<td>Address</td>
		<td>Phone</td>
		<td>Email</td>
	</tr>
	<?foreach($client->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title= "Proceed Order with Client '.$i->client_id.'"')?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
	</tr>
	<?endforeach?>
</table>


<? endblock() ?>

<? startblock('bottom_content') ?>
<? endblock() ?>

<?end_extend()?>