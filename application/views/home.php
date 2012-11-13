<?extend ('template/base_template.php')?>

<? startblock('menu_tab') ?>
<li><?=anchor('', 'home', array('title' => 'home', 'class' => 'nav'))?></li>
<li><?=anchor('coms/about', 'about', array('title' => 'about', 'class' => 'nav'))?></li>
<li><?=anchor('coms/contact', 'contact', array('title' => 'contact', 'class' => 'nav'))?></li>
<? endblock() ?>

<? startblock('left_menu') ?>
<? endblock() ?>

<? startblock('page_title') ?>
User Login
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Please input your username and your password</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<?=form_open('')?>

	<script>
	$(function() {
		$( "input:submit", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return false; });
	});
	</script>
<table border="0" width="100%">
<tr>
<td align="right" width="47%">Username : </td>
<td width="3%">&nbsp;</td>
<td width="50%">
<?=form_input(array('name' => 'username', 'value' => set_value('username'), 'maxlength' => '10', 'size' => '10'))?>
<?=form_error('username')?>
</td>
</tr>
<tr>
<td align="right" width="47%">Password : </td>
<td width="3%" width="50%">&nbsp;</td>
<td>
<?=form_password(array('name' => 'password', 'value' => set_value('password'), 'maxlength' => '10', 'size' => '10'))?>
<?=form_error('password')?>
</td>
</tr>
<tr>
<td align="center" colspan="3"><div class="demo"><?=form_submit('login', 'Login')?></div></td>
</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<? endblock() ?>

<?end_extend()?>