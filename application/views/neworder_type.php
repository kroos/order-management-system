<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
New Order Type
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Add new order type here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<td>Order Type</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?=form_input(array('name' => 'type', 'value' => set_value('type'), 'maxlength' => '15', 'size' => '15'))?><br /><?=form_error('type')?><td>
		<td><?=form_submit(array('name' => 'new_type', 'value' => 'Add Order Type'))?></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
	<td>Order Type ID</td>
	<td>Order Type</td>
	<td>&nbsp;</td>
</tr>
<?foreach($query->result() as $r1):?>
<tr>
	<td><?=$r1->order_type_id?></td>
	<td><?=$r1->type?></td>
	<td><?=anchor('coms/neworder_typer/'.$r1->order_type_id, 'REMOVE', array('title' => 'REMOVE Order Type ID '.$r1->order_type_id))?></td>
</tr>
<?endforeach?>
</table>
<? endblock() ?>

<?end_extend()?>