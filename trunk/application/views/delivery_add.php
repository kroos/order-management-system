<?extend ('details.php')?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>

	<script>
	$(function() {
		$( "input:submit, a, button", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return true; });
	});
	</script>

<p>Fill up the form for additional delivery address</p>
<h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>



<? startblock('bottom_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>
		<div class="product_box">
		<div class="prod_title">Additional Delivery Address</div>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Order Code</td>
		<td>Name</td>
		<td>Address</td>
		<td>Phone</td>
		<td>Email</td>
		<td>&nbsp;</td>
	</tr>

	<tr>
		<td><?=$this->uri->segment(3, 0)?><br /><?=form_hidden('delivery_info_id', $this->uri->segment(3, 0))?></td>
		<td><?=form_input(array('name' => 'name_delivery', 'value' => set_value('name_delivery'), 'maxlength' => '35'))?><br /><?=form_error('name_delivery')?></td>
		<td><?=form_textarea(array('name' => 'address_delivery', 'value' => set_value('address_delivery'), 'cols' => '10', 'rows' => '5'))?><br /><?=form_error('address_delivery')?></td>
		<td><?=form_input(array('name' => 'phone_delivery', 'value' => set_value('phone_delivery'), 'maxlength' => '12'))?><br /><?=form_error('phone_delivery')?></td>
		<td><?=form_input(array('name' => 'email_delivery', 'value' => set_value('email_delivery'), 'maxlength' => '30'))?><br /><?=form_error('email_delivery')?></td>
		<td><div class="demo"><?=form_submit('delivery_address', 'Add')?></div></td>
	</tr>
</table>
		</div>
		</td>
	</tr>
	<tr>
	<td>

		<div class="product_box">
		<div class="prod_title">Additional Delivery Address</div>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Delivery Address ID</td>
		<td>Order Code</td>
		<td>Name</td>
		<td>Additional Address</td>
		<td>Phone</td>
		<td>Email</td>
		<td>&nbsp;</td>
	</tr>
	<?foreach($delivery_address_list->result() as $b):?>
	<tr>
		<td><?=$b->delivery_address_id?></td>
		<td><?=$b->order_my_id?></td>
		<td><?=$b->name_delivery?></td>
		<td><?=$b->address_delivery?></td>
		<td><?=$b->phone_delivery?></td>
		<td><?=$b->email_delivery?></td>
		<td><div class="demo"><?=anchor('coms/delivery_addr/'.$this->uri->segment(3, 0).'/'.$b->delivery_address_id, 'REMOVE', array('title' => 'Remove ID '.$b->delivery_address_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
		</div>

	</td>
	</tr>
	<tr>
	<td><div class="demo"><?=anchor('coms/delivery/'.$this->uri->segment(3, 0), 'BACK', array())?></div>
	</td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<?end_extend()?>