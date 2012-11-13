<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
New Payment Mode
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Add new payment mode here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<td>Payment Mode</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?=form_input(array('name' => 'mode_payment', 'value' => set_value('mode_payment'), 'maxlength' => '15', 'size' => '15'))?><br /><?=form_error('mode_payment')?><td>
		<td><?=form_submit(array('name' => 'new_mode_payment', 'value' => 'Add Mode Payment'))?></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
	<td>Payment Mode ID</td>
	<td>Payment Mode</td>
	<td>&nbsp;</td>
</tr>
<?foreach($query->result() as $r1):?>
<tr>
	<td><?=$r1->mode_payment_id?></td>
	<td><?=$r1->mode_payment?></td>
	<td><?=anchor('coms/newmode_paymentr/'.$r1->mode_payment_id, 'REMOVE', array('title' => 'REMOVE Payment Mode ID '.$r1->mode_payment_id))?></td>
</tr>
<?endforeach?>
</table>
<? endblock() ?>

<?end_extend()?>