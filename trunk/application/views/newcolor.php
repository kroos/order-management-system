<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
New Color
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Add new color here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<td>Color</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?=form_input(array('name' => 'color', 'value' => set_value('color'), 'maxlength' => '7', 'size' => '7'))?><br /><?=form_error('color')?><td>
		<td><?=form_submit(array('name' => 'new_color', 'value' => 'Add color'))?></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
	<td>Color ID</td>
	<td>Color</td>
	<td>&nbsp;</td>
</tr>
<?foreach($query->result() as $r1):?>
<tr>
	<td><?=$r1->color_id?></td>
	<td><?=$r1->color?></td>
	<td><?=anchor('coms/newcolorr/'.$r1->color_id, 'REMOVE', array('title' => 'REMOVE Color ID '.$r1->color_id))?></td>
</tr>
<?endforeach?>
</table>
<? endblock() ?>

<?end_extend()?>