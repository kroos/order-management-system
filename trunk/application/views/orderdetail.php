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
<?=form_open()?>
<table border="0" cellpadding="2" width="100%">
<?php
foreach($method->result() as $i)
	{
		$method1[$i->method_order_id] = $i->method_order;
	}
?>
	<tr>
		<td width="30%" align="right">Method Order : </td>
		<td width="70%" align="left">
		<?=form_dropdown('method', $method1)?><?=form_error('method')?>
		</td>
	</tr>
<?php
foreach($type->result() as $i)
	{
		$type1[$i->order_type_id] = $i->type;
	}
?>
	<tr>
		<td width="30%" align="right">Order Type : </td>
		<td width="70%" align="left">
		<?=form_dropdown('type', $type1)?><?=form_error('type')?>
		</td>
	</tr>
	<tr>
		<td width="30%" align="right">Date : </td>
		<td width="70%" align="left"><p>
		<?=form_input(array('name' => 'date', 'value' => set_value('date'), 'id' => 'datepicker'))?></p>
		<?=form_error('date')?>
		</td>
	</tr>
		<?=form_hidden('order_status', '1')?>
	<tr>
		<td colspan="2" align="right"><div class="demo"><?=form_submit('next', 'Next')?></div></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<?end_extend()?>