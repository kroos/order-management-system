<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
New Client
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Add new client here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr>
		<td>Name</td><td><?=form_input(array('name' => 'client', 'value' => set_value('client'), 'maxlength' => '30', 'size' => '30'))?>&nbsp;<?=form_error('client')?></td></tr>
		<tr><td>Address</td><td><?=form_textarea(array('name' => 'address_client', 'value' => set_value('address_client'), 'rows' => '3', 'cols' => '30'))?>&nbsp;<?=form_error('address_client')?></td></tr>
		<tr><td>Phone</td><td><?=form_input(array('name' => 'phone_client', 'value' => set_value('phone_client'), 'size' => '30', 'maxlength' => '30'))?>&nbsp;<?=form_error('phone_client')?></td></tr>
		<tr><td>Email</td><td><?=form_input(array('name' => 'email_client',  'value' => set_value('email_client')))?>&nbsp;<?=form_error('email_client')?></td></tr>
		<tr><td>Facebook</td><td><?=form_input(array('name' => 'facebook_id_client',  'value' => set_value('facebook_id_client')))?>&nbsp;<?=form_error('facebook_id_client')?></td></tr>
		<tr><td>Twitter</td><td><?=form_input(array('name' => 'twitter_id_client',  'value' => set_value('twitter_id_client')))?>&nbsp;<?=form_error('twitter_id_client')?></td></tr>
		<tr><td colspan="2"><?=form_submit(array('name' => 'new_client', 'value' => 'Add Client', ))?></td></tr>
	</tr>
</table>
<?=form_close()?>

<? endblock() ?>

<? startblock('bottom_content') ?>
<? endblock() ?>

<?end_extend()?>