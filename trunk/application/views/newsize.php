<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
New Size
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Add new size here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<td>Size</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?=form_input(array('name' => 'size', 'value' => set_value('size'), 'maxlength' => '7', 'size' => '7'))?><br /><?=form_error('size')?><td>
		<td><?=form_submit(array('name' => 'new_size', 'value' => 'Add Size'))?></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
	<td>Size ID</td>
	<td>Size</td>
	<td>&nbsp;</td>
</tr>
<?foreach($query->result() as $r1):?>
<tr>
	<td><?=$r1->size_id?></td>
	<td><?=$r1->size?></td>
	<td><?=anchor('coms/newsizer/'.$r1->size_id, 'REMOVE', array('title' => 'REMOVE Size ID '.$r1->size_id))?></td>
</tr>
<?endforeach?>
</table>
<? endblock() ?>

<?end_extend()?>