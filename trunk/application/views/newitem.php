<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
New Item
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Add new item here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<td>Item</td>
		<td>Price</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?=form_input(array('name' => 'item', 'value' => set_value('item'), 'maxlength' => '30', 'size' => '30'))?><br /><?=form_error('item')?><td>
		<?=form_input(array('name' => 'price', 'value' => set_value('price'), 'maxlength' => '8', 'size' => '8'))?><br /><?=form_error('price')?></td>
		<td><?=form_submit(array('name' => 'new_item', 'value' => 'Add Item', ))?></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
	<td>Item ID</td>
	<td>Item</td>
	<td>Price
	</td>&nbsp;</td>
</tr>
<?foreach($query->result() as $r):?>
<tr>
	<td><?=$r->item_id?></td>
	<td><?=$r->item?></td>
	<td><?=$r->price?></td>
	<td><?=anchor('coms/newitemr/'.$r->item_id, 'REMOVE', array('title' => 'REMOVE Item ID '.$r->item_id))?></td>
</tr>
<?endforeach?>
</table>
<? endblock() ?>

<?end_extend()?>