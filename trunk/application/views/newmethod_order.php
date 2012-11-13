<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
New Order Method
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Add new order method here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<td>Order Method</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?=form_input(array('name' => 'method_order', 'value' => set_value('method_order'), 'maxlength' => '10', 'size' => '10'))?><br /><?=form_error('method_order')?><td>
		<td><?=form_submit(array('name' => 'new_method_order', 'value' => 'Add Order Method'))?></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
	<td>Order Method ID</td>
	<td>Order Method</td>
	<td>&nbsp;</td>
</tr>
<?foreach($query->result() as $r1):?>
<tr>
	<td><?=$r1->method_order_id?></td>
	<td><?=$r1->method_order?></td>
	<td><?=anchor('coms/newmethod_orderr/'.$r1->method_order_id, 'REMOVE', array('title' => 'REMOVE Method Order ID '.$r1->method_order_id))?></td>
</tr>
<?endforeach?>
</table>
<? endblock() ?>

<?end_extend()?>