<?extend ('order.php')?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>
<p>Choose your order items</p>
<h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>

<? endblock() ?>

<? startblock('mid_content') ?>

	<script>
	$(function() {
		$( "input:submit, a, button", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return true; });
	});
	</script>

<h2><div class="demo"><?=anchor('coms/detailsorder/'.$this->uri->segment(3, 0), 'Form View', 'title = "Form View"')?></div></h2>
<p>Order Details : </p>
<table border="0" cellpadding="2" width="100%">
	<tr>
		<td width="15%">Client : </td>
		<td><?=$client->row()->client?></td>
	</tr>
	<tr>
		<td width="15%">Address : </td>
		<td><?=$client->row()->address_client?></td>
	</tr>
	<tr>
		<td width="15%">Phone : </td>
		<td><?=$client->row()->phone_client?></td>
	</tr>
	<tr>
		<td width="15%">Email : </td>
		<td><?=$client->row()->email_client?></td>
	</tr>
	<tr>
		<td width="15%">Facebook : </td>
		<td><?=$client->row()->facebook_id_client?></td>
	</tr>
	<tr>
		<td width="15%">Twitter : </td>
		<td><?=$client->row()->twitter_id_client?></td>
	</tr>
</table>
<p>&nbsp;</p>
<table border="0" width="100%" id="table1" cellpadding="2" style="border-collapse: collapse">
	<tr>
		<td>
		<h2>order summary</h2>
		<p>date order : <?=unix_to_human(mysql_to_unix($order_summary->row()->date_order))?></p>
		<p>order method : <?=$order_summary->row()->method_order?></td>
	</tr>
	<tr>
		<td>
		<h2>payment info</h2>
		<p>bank : <?=$order_summary->row()->bank?></p>
		<p>total payment : <?=$order_summary->row()->total_payment?></p>
		<?if ($order_summary->row()->date_payment == NULL) :?>
		<p>date payment : </td>
		<?else :?>
		<p>date payment : <?=unix_to_human(mysql_to_unix($order_summary->row()->date_payment))?></td>
		<?endif?>
	</tr>
	<tr>
		<td>
		<h2>delivery info</h2>
		<?if ($order_summary->row()->delivery_date == NULL):?>
		<p>delivery date : </p>
		<?else:?>
		<p>delivery date : <?=unix_to_human(mysql_to_unix($order_summary->row()->delivery_date))?></p>
		<?endif?>
		<p>delivery type : <?=$order_summary->row()->delivery_type?></p>
		<p>tracking no : <?=$order_summary->row()->tracking_no?></p>
		<p>delivered by : <?=$order_summary->row()->delivered_by?></td>
	</tr>
	<tr>
		<td>
		<h2>item</h2>
		<table border="1" width="100%" id="table2" cellpadding="2" style="border-collapse: collapse">
			<tr>
				<td>item</td>
				<td>size</td>
				<td>color</td>
				<td>quantity</td>
				<td>discount</td>
				<td>total</td>
			</tr>
			<?$sum = 0?>
			<?foreach($item_where_view->result() as $y):?>
			<tr>
				<td><?=$y->item?></td>
				<td><?=$y->size?></td>
				<td><?=$y->color?></td>
				<td><?=$y->quantity?></td>
				<td><?=$y->discount?></td>
				<td><?=$y->total_price?></td>
				<?$sum += $y->total_price?>
			</tr>
			<?endforeach?>
			<tr>
				<td colspan="5">grand total</td>
				<td><?=$sum?></td>
			</tr>
		</table>
		</td>
	</tr>
</table>

<? endblock() ?>

<? startblock('bottom_content') ?>
<div class="product_box">
<div class="prod_title">Item</div>
<p>Set your details overhere</p>
<table border="0" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Item</td>
		<td>Payment</td>
		<td>Delivery Info</td>
		<td>Feedback</td>
	</tr>
	<tr>
		<td><div class="demo"><?=anchor('coms/item/'.$this->uri->segment(3, 0), 'Add Items Info', array('title' => 'Add Items Info'))?></div></td>
		<td><div class="demo"><?=anchor('coms/payment/'.$this->uri->segment(3, 0), 'Add Payment Info', array('title' => 'Add Payment Info'))?></div></td>
		<td><div class="demo"><?=anchor('coms/delivery/'.$this->uri->segment(3, 0), 'Add Delivery Info', array('title' => 'Add Delivery Info'))?></div></td>
		<td><div class="demo"><?=anchor('coms/feedback/'.$this->uri->segment(3, 0), 'Add Feedback Info', array('title' => 'Add Feedback Info'))?></div></td>
	</tr>
</table>
</div>
<? endblock() ?>

<?end_extend()?>