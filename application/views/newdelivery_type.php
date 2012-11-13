<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
New Delivery Type
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Add new delivery type here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<td>Delivery Type</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?=form_input(array('name' => 'delivery_type', 'value' => set_value('delivery_type'), 'maxlength' => '15', 'size' => '15'))?><br /><?=form_error('delivery_type')?><td>
		<td><?=form_submit(array('name' => 'new_delivery_type', 'value' => 'Add Delivery Type'))?></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
	<td>Delivery Type ID</td>
	<td>Delivery Type</td>
	<td>&nbsp;</td>
</tr>
<?foreach($query->result() as $r1):?>
<tr>
	<td><?=$r1->delivery_type_id?></td>
	<td><?=$r1->delivery_type?></td>
	<td><?=anchor('coms/newdelivery_typer/'.$r1->delivery_type_id, 'REMOVE', array('title' => 'REMOVE Delivery Type ID '.$r1->delivery_type_id))?></td>
</tr>
<?endforeach?>
</table>
<? endblock() ?>

<?end_extend()?>