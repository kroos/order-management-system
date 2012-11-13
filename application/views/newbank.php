<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
New Bank
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Add new bank here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<td>Bank</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td><?=form_input(array('name' => 'bank', 'value' => set_value('bank'), 'maxlength' => '10', 'size' => '10'))?><br /><?=form_error('bank')?><td>
		<td><?=form_submit(array('name' => 'new_bank', 'value' => 'Add bank'))?></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
<tr>
	<td>Bank ID</td>
	<td>Bank</td>
	<td>&nbsp;</td>
</tr>
<?foreach($query->result() as $r1):?>
<tr>
	<td><?=$r1->bank_id?></td>
	<td><?=$r1->bank?></td>
	<td><?=anchor('coms/newbankr/'.$r1->bank_id, 'REMOVE', array('title' => 'REMOVE Bank ID '.$r1->bank_id))?></td>
</tr>
<?endforeach?>
</table>
<? endblock() ?>

<?end_extend()?>