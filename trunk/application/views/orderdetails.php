<?extend ('order.php')?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Order here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>

	<script>
	$(function() {
		$( "input:submit, a, button", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return true; });
	});
	</script>
		<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#datepicker').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
			});
		</script>

<h2><div class="demo"><?=anchor('coms/details/'.$this->uri->segment(3, 0), 'Summary View', 'title = "Summary View"')?></div></h2>
<p>This is an order for : </p>
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
<? endblock() ?>

<? startblock('bottom_content') ?>
<table border="1" width="100%" style="border-collapse: collapse" cellpadding="2">
	<tr>
		<td><div class="prod_title">Item</div><p>&nbsp;</p>
		<?=form_open()?>
		<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse" class="autoTable">
			<tr>
				<td>Order Code</td>
				<td>Item</td>
				<td>Size</td>
				<td>Color</td>
				<td>Quantity</td>
				<td>Discount</td>
				<td>&nbsp;</td>

			</tr>
			<?php
			foreach($item->result() as $i)
				{
					$item1[$i->item_id] = $i->item.' = RM'.$i->price;
				}
			foreach($size->result() as $s)
				{
					$size1[$s->size_id] = $s->size;
				}
			foreach($color->result() as $c)
				{
					$color1[$c->color_id] = $c->color;
				}
			?>
			<tr>
				<td><?=$this->uri->segment(3, 0)?><?=form_hidden('order_my_id', $this->uri->segment(3, 0))?><br /><?=form_error('order_my_id')?></td>
				<td><?=form_dropdown('item', $item1)?><br /><?=form_error('item')?></td>
				<td><?=form_dropdown('size', $size1)?><br /><?=form_error('size')?></td>
				<td><?=form_dropdown('color', $color1)?><br /><?=form_error('color')?></td>
				<td><?=form_input(array('name' => 'quantity', 'value' => set_value('quantity'), 'maxlength' => '3', 'size' => '3'))?><br /><?=form_error('quantity')?></td>
				<td>RM <?=form_input(array('name' => 'discount', 'value' => set_value('discount'), 'maxlength' => '4', 'size' => '4'))?><br /><?=form_error('discount')?></td>
				<td><div class="demo"><?=form_submit('item_info', 'Add')?></div></td>
			</tr>
		</table>
		<?=form_close()?>
<p>&nbsp;</p>
		<?if ($item_list->num_rows() < 1):?>
		<?else :?>
	<table  border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
			<tr>
				<td>Order Item ID</td>
				<td>Item</td>
				<td>Size</td>
				<td>Color</td>
				<td>Quantity</td>
				<td>Unit Price</td>
				<td>Discount</td>
				<td>Total Price</td>
				<td>&nbsp;</td>
			</tr>
			<?$z = 0?>
			<?foreach($item_list->result() as $b):?>
			<tr>
				<td><?=$b->id?></td>
				<td><?=$b->item?></td>
				<td><?=$b->size?></td>
				<td><?=$b->color?></td>
				<td><?=$b->quantity?></td>
				<td><?=$b->price?></td>
				<td>RM <?=$b->discount?></td>
				<td>RM <?=$b->total_price?><?$z += $b->total_price?></td>
				<td><div class="demo"><?=anchor('coms/itemr/'.$this->uri->segment(3, 0).'/'.$b->id, 'REMOVE', array('title' => 'Remove ID '.$b->id))?></div></td>
			</tr>
			<?endforeach?>
			<tr>
				<td colspan="7">Grand Total</td>
				<td>RM <?=$z?></td>
			</tr>
	</table>
		<?endif?>

		</td>
	</tr>
	<tr>
		<td>
		<div class="prod_title">Payment</div><p>&nbsp;</p>
		<?=form_open()?>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Order Code</td>
		<td>Bank</td>
		<td>Total Payment</td>
		<td>Mode Payment</td>
		<td>Date Payment</td>
		<td>Reference No</td>
		<td>&nbsp;</td>
	</tr>
<?php
foreach($bank->result() as $i)
	{
		$bank1[$i->bank_id] = $i->bank;
	}
foreach($mode_payment->result() as $i)
	{
		$mode_payment1[$i->mode_payment_id] = $i->mode_payment;
	}
?>
	<tr>
		<td><?=$this->uri->segment(3, 0)?><br /><?=form_hidden('order_my_id', $this->uri->segment(3, 0))?></td>
		<td><?=form_dropdown('bank', $bank1)?></td>
		<td><?=form_input(array('name' => 'total_payment', 'value' => set_value('total_payment'), 'maxlength' => '7', 'size' => '7'))?><br /><?=form_error('total_payment')?></td>
		<td><?=form_dropdown('mode_payment', $mode_payment1)?></td>
		<td><?=form_input(array('name' => 'date', 'value' => set_value('date'), 'id' => 'datepicker', 'size' => '10', 'maxlength' => '20'))?><br /><?=form_error('date')?></td>
		<td><?=form_input(array('name' => 'ref_no', 'value' => set_value('ref_no'), 'maxlength' => '16', 'size' => '16'))?><br /><?=form_error('ref_no')?></td>
		<td><div class="demo"><?=form_submit('payment_info', 'Add')?></div></td>
	</tr>
</table>
<?=form_close()?>
<p>&nbsp;</p>
<?if($payment_list->num_rows() < 1):?>
<?else:?>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Payment ID</td>
		<td>Bank</td>
		<td>Total Payment</td>
		<td>Mode Payment</td>
		<td>Date Payment</td>
		<td>Reference No</td>
		<td>&nbsp;</td>
	</tr>
	<?foreach($payment_list->result() as $b):?>
	<tr>
		<td><?=$b->payment_info_id?></td>
		<td><?=$b->bank?></td>
		<td>RM <?=$b->total_payment?></td>
		<td><?=$b->mode_payment?></td>
		<td><?=unix_to_human(mysql_to_unix($b->date_payment))?></td>
		<td><?=$b->ref_no?></td>
		<td><div class="demo"><?=anchor('coms/paymentr/'.$this->uri->segment(3, 0).'/'.$b->payment_info_id, 'REMOVE', array('title' => 'Remove ID '.$b->payment_info_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
<?endif?>
		</td>
	</tr>
	<tr>
		<td>

		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#datepicker1').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
			});
		</script>

<?=form_open()?>
		<div class="prod_title">Delivery</div><p>&nbsp;</p>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Order Code</td>
		<td>Delivery Type</td>
		<td>Delivery Date</td>
		<td>Tracking No</td>
		<td>Delivery By</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
<?php
foreach($delivery_type->result() as $i)
	{
		$delivery_type1[$i->delivery_type_id] = $i->delivery_type;
	}
?>
	<tr>
		<td><?=$this->uri->segment(3, 0)?><br /><?=form_hidden('order_my_id', $this->uri->segment(3, 0))?></td>
		<td><?=form_dropdown('delivery_type', $delivery_type1)?></td>
		<td><?=form_input(array('name' => 'delivery_date', 'value' => set_value('delivery_date'), 'id' => 'datepicker1', 'size' => '10', 'maxlength' => '20'))?><br /><?=form_error('delivery_date')?></td>
		<td><?=form_input(array('name' => 'tracking_no', 'value' => set_value('tracking_no'), 'maxlength' => '20', 'size' => '20'))?><br /><?=form_error('tracking_no')?></td>
		<td><?=form_input(array('name' => 'delivered_by', 'value' => $this->session->userdata('username'), 'maxlength' => '16', 'size' => '16'))?><br /><?=form_error('delivered_by')?></td>
		<td><div class="demo"><?=form_submit('delivery_info', 'Add')?></div></td>
	</tr>
</table>
<?=form_close()?>

<p>&nbsp;</p>
<?if($delivery_list->num_rows() < 1):?>
<?else:?>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Delivery ID</td>
		<td>Delivery Type</td>
		<td>Delivery Date</td>
		<td>Tracking No</td>
		<td>Delivered By</td>
		<td>&nbsp;</td>
	</tr>
	<?foreach($delivery_list->result() as $b):?>
	<tr>
		<td><?=$b->delivery_info_id?></td>
		<td><?=$b->delivery_type?></td>
		<?if(!$b->delivery_date):?>
		<?else:?>
		<td><?=unix_to_human(mysql_to_unix($b->delivery_date))?></td>
		<?endif?>
		<td><?=$b->tracking_no?></td>
		<td><?=$b->delivered_by?></td>
		<td><div class="demo"><?=anchor('coms/deliveryr/'.$this->uri->segment(3, 0).'/'.$b->delivery_info_id, 'REMOVE', array('title' => 'Remove ID '.$b->delivery_info_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
<?endif?>
		</td>
	</tr>
	<tr>
		<td>
		<div class="prod_title">Additional Delivery Address</div><p>&nbsp;</p>
		
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Order Code</td>
		<td>Person Name</td>
		<td>Additional Delivery Address</td>
		<td>Phone</td>
		<td>Email</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
	<?=form_open()?>
		<td><?=$this->uri->segment(3, 0)?><br /><?=form_hidden('order_my_id', $this->uri->segment(3, 0))?></td>
		<td><?=form_input(array('name' => 'name', 'value' => set_value('name'), 'size' => '20', 'maxlength' => '20'))?><br /><?=form_error('name')?></td>
		<td><?=form_textarea(array('name' => 'add_address', 'value' => set_value('add_address'), 'rows' => '5', 'cols' => '20'))?><br /><?=form_error('add_address')?></td>
		<td><?=form_input(array('name' => 'phone', 'value' => set_value('phone'), 'size' => '20', 'maxlength' => '20'))?><br /><?=form_error('phone')?></td>
		<td><?=form_input(array('name' => 'email', 'value' => set_value('email'), 'size' => '20', 'maxlength' => '20'))?><br /><?=form_error('email')?></td>
		<td><div class="demo"><?=form_submit('delivery_address', 'Add')?></div></td>
	<?=form_close()?>
	</tr>
</table>

<p>&nbsp;</p>
<?if($delivery_address->num_rows() < 1):?>
<?else:?>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Delivery Address ID</td>
		<td>Person Name</td>
		<td>Additional Address</td>
		<td>Phone</td>
		<td>Email</td>
		<td>&nbsp;</td>
	</tr>
	<?foreach($delivery_address->result() as $b):?>
	<tr>
		<td><?=$b->delivery_address_id?></td>
		<td><?=$b->name_delivery?></td>
		<td><?=$b->address_delivery?></td>
		<td><?=$b->phone_delivery?></td>
		<td><?=$b->email_delivery?></td>
		<td><div class="demo"><?=anchor('coms/delivery_addr/'.$this->uri->segment(3, 0).'/'.$b->delivery_address_id, 'REMOVE', array('title' => 'Remove ID '.$b->delivery_address_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
<?endif?>
		</td>
	</tr>
	<tr>
		<td><div class="prod_title">Feedback</div><p>&nbsp;</p>
		
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Order Code</td>
		<td>Feedback</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
	<?=form_open()?>
		<td><?=$this->uri->segment(3, 0)?><br /><?=form_hidden('order_my_id', $this->uri->segment(3, 0))?></td>
		<td><?=form_textarea(array('name' => 'feed', 'value' => set_value('feed'), 'rows' => '5', 'cols' => '20'))?><br /><?=form_error('feed')?></td>
		<td><div class="demo"><?=form_submit('feedback', 'Add')?></div></td>
	<?=form_close()?>
	</tr>
</table>
<p>&nbsp;</p>
<?if($feedback->num_rows() < 1):?>
<?else:?>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Order Code</td>
		<td>Feedback</td>
		<td>&nbsp;</td>
	</tr>
	<?foreach($feedback->result() as $b):?>
	<tr>
		<td><?=$b->order_my_id?></td>
		<td><?=$b->comments?></td>
		<td><div class="demo"><?=anchor('coms/feedbackr/'.$this->uri->segment(3, 0).'/'.$b->feedback_id, 'REMOVE', array('title' => 'Remove ID '.$b->feedback_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
<?endif?>

		</td>
	</tr>

</table>

<? endblock() ?>

<?end_extend()?>