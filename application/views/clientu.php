<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
Edit Client
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Edit client here</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>

<?=form_open()?>
<table border="0" cellpadding="2" cellspacing="2" width="100%">
	<tr><td>Name</td><td><?=form_input(array('name' => 'client', 'value' => $sclient->row()->client, 'maxlength' => '30', 'size' => '30'))?>&nbsp;<?=form_error('client')?></td></tr>
	<tr><td>Address</td><td><?=form_textarea(array('name' => 'address_client', 'value' => $sclient->row()->address_client, 'rows' => '3', 'cols' => '30'))?>&nbsp;<?=form_error('address_client')?></td></tr>
	<tr><td>Phone</td><td><?=form_input(array('name' => 'phone_client', 'value' => $sclient->row()->phone_client, 'size' => '30', 'maxlength' => '30'))?>&nbsp;<?=form_error('phone_client')?></td></tr>
	<tr><td>Email</td><td><?=form_input(array('name' => 'email_client',  'value' => $sclient->row()->email_client))?>&nbsp;<?=form_error('email_client')?></td></tr>
	<tr><td>Facebook</td><td><?=form_input(array('name' => 'facebook_id_client',  'value' => $sclient->row()->facebook_id_client))?>&nbsp;<?=form_error('facebook_id_client')?></td></tr>
	<tr><td>Twitter</td><td><?=form_input(array('name' => 'twitter_id_client',  'value' => $sclient->row()->twitter_id_client))?>&nbsp;<?=form_error('twitter_id_client')?></td></tr>
	<tr><td colspan="2"><?=form_submit(array('name' => 'upd_client', 'value' => 'Update Client', ))?></td></tr>
</table>
<?=form_close()?>

<? endblock() ?>

<? startblock('bottom_content') ?>
<? endblock() ?>

<?end_extend()?>