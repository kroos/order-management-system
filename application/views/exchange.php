<?extend ('details.php')?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>
<p>Choose your order exchange</p>
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
		<div class="prod_title">Exchange</div>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Order Code</td>
		<td>Status</td>
		<td>Return Tracking No</td>
		<td>Exchange Date</td>
		<td>Size</td>
		<td>Remarks</td>
		<td>&nbsp;</td>
	</tr>
<?php
foreach($size->result() as $i)
	{
		$size1[$i->size_id] = $i->size;
	}
?>
	<tr>
		<td><?=$this->uri->segment(4, 0)?><br /><?=form_hidden('id', $this->uri->segment(4, 0))?></td>
		<td><?=form_dropdown('exchange_approve', array('1' => 'APPROVE', '0' => 'NOT APPROVE'))?></td>
		<td><?=form_input(array('name' => 'return_tracking_no', 'value' => set_value('return_tracking_no')))?><br /><?=form_error('return_tracking_no')?></td>
		<td><?=form_input(array('name' => 'date_exchange', 'value' => set_value('date_exchange'), 'id' => 'datepicker', 'size' => '20', 'maxlength' => '20'))?><br /><?=form_error('date_exchange')?></td>
		<td><?=form_dropdown('size_id', $size1)?></td>
		<td><?=form_textarea(array('name' => 'remarks', 'value' => set_value('remarks'), 'cols' => '10', 'rows' => '2'))?><br /><?=form_error('remarks')?></td>
		<td><div class="demo"><?=form_submit('exchange_info', 'Add')?></div></td>
	</tr>
</table>
		</div>
		</td>
	</tr>
	<tr>
	<td>
<?if($exchange_view->num_rows() < 1):?>
<?else:?>
		<div class="product_box">
		<div class="prod_title">Exchange</div>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Exchange ID</td>
		<td>Order Item ID</td>
		<td>Exchange Status</td>
		<td>Return Tracking No</td>
		<td>Exchange Date</td>
		<td>Size</td>
		<td>Remarks</td>
		<td>&nbsp;</td>
	</tr>
	<?foreach($exchange_view->result() as $b):?>
	<tr>
		<td><?=$b->exchange_id?></td>
		<td><?=$b->id?></td>
		<?if($b->exchange_approve == 1):?>
		<td>Approve</td>
		<?else:?>
		<td> Not Approve</td>
		<?endif?>
		<td><?=$b->return_tracking_no?></td>
		<td><?=unix_to_human(mysql_to_unix($b->date_exchange))?></td>
		<td><?=$b->size?></td>
		<td><?=$b->remarks?></td>
		<td><div class="demo"><?=anchor('coms/exchanger/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0).'/'.$b->exchange_id, 'REMOVE', array('title' => 'Remove ID '.$b->exchange_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
		</div>
<?endif?>
	</td>
	</tr>
	<tr>
	<td><div class="demo"><?=anchor('coms/item/'.$this->uri->segment(3, 0), 'BACK', array())?></div></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<?end_extend()?>