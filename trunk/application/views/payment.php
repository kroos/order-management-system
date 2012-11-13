<?extend ('details.php')?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>
<p>Choose your order payment</p>
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
		<div class="prod_title">Payment</div>
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
		<td><?=form_input(array('name' => 'date', 'value' => set_value('date'), 'id' => 'datepicker', 'size' => '20', 'maxlength' => '20'))?><br /><?=form_error('date')?></td>
		<td><?=form_input(array('name' => 'ref_no', 'value' => set_value('ref_no'), 'maxlength' => '16', 'size' => '16'))?><br /><?=form_error('ref_no')?></td>
		<td><div class="demo"><?=form_submit('payment_info', 'Add')?></div></td>
	</tr>
</table>
		</div>
		</td>
	</tr>
	<tr>
	<td>

		<div class="product_box">
		<div class="prod_title">Payment</div>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Payment ID</td>
		<td>Order Code</td>
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
		<td><?=$b->order_my_id?></td>
		<td><?=$b->bank?></td>
		<td>MYR <?=$b->total_payment?></td>
		<td><?=$b->mode_payment?></td>
		<td><?=unix_to_human(mysql_to_unix($b->date_payment))?></td>
		<td><?=$b->ref_no?></td>
		<td><div class="demo"><?=anchor('coms/paymentr/'.$this->uri->segment(3, 0).'/'.$b->payment_info_id, 'REMOVE', array('title' => 'Remove ID '.$b->payment_info_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
		</div>

	</td>
	</tr>
	<tr>
	<td><div class="demo"><?=anchor('coms/details/'.$this->uri->segment(3, 0), 'BACK', array())?></div></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<?end_extend()?>