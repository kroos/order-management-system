<?extend ('details.php')?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>
<p>Choose your order delivery</p>
<h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>



<? startblock('bottom_content') ?>


		<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#datepicker').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
			});
		</script>


<?=form_open()?>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>
		<div class="product_box">
		<div class="prod_title">Delivery Info</div>
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
		<td><?=form_input(array('name' => 'delivery_date', 'value' => set_value('delivery_date'), 'id' => 'datepicker', 'size' => '20', 'maxlength' => '20'))?><br /><?=form_error('delivery_date')?></td>
		<td><?=form_input(array('name' => 'tracking_no', 'value' => set_value('tracking_no'), 'maxlength' => '20', 'size' => '20'))?><br /><?=form_error('tracking_no')?></td>
		<td><?=form_input(array('name' => 'delivered_by', 'value' => $this->session->userdata('username'), 'maxlength' => '16', 'size' => '16'))?><br /><?=form_error('delivered_by')?></td>
		<td><div class="demo"><?=form_submit('delivery_info', 'Add')?></div></td>
	</tr>
</table>
		</div>
		</td>
	</tr>
	<tr>
	<td>
<?if ($delivery_list->num_rows() < 1):?>
<?else:?>
		<div class="product_box">
		<div class="prod_title">Delivery</div>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Delivery ID</td>
		<td>Order Code</td>
		<td>Delivery Type</td>
		<td>Delivery Date</td>
		<td>Tracking No</td>
		<td>Delivered By</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<?foreach($delivery_list->result() as $b):?>
	<tr>
		<td><?=$b->delivery_info_id?></td>
		<td><?=$b->order_my_id?></td>
		<td><?=$b->delivery_type?></td>
		<td><?=unix_to_human(mysql_to_unix($b->delivery_date))?></td>
		<td><?=$b->tracking_no?></td>
		<td><?=$b->delivered_by?></td>
		<td><div class="demo"><?=anchor('coms/deliveryr/'.$this->uri->segment(3, 0).'/'.$b->delivery_info_id, 'REMOVE', array('title' => 'Remove ID '.$b->delivery_info_id))?></div></td>
		<td><div class="demo"><?=anchor('coms/delivery_add/'.$this->uri->segment(3, 0).'/'.$b->delivery_info_id, 'Add Address', array('title' => 'Add ID Address '.$b->delivery_info_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
		</div>
<?endif?>
	</td>
	</tr>
	<tr>
	<td><div class="demo"><?=anchor('coms/details/'.$this->uri->segment(3, 0), 'BACK', array())?></div></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<?end_extend()?>