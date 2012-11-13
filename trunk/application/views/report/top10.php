<?extend ('report/main.php')?>

<? startblock('top_content') ?>
 <p>Top 10 item report</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>


<? startblock('mid_content') ?>
	<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-timepicker-addon.js"></script>
	<script>
	$(function() {
		$( "input:submit", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return false; });
	});
	</script>
		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#datepicker1').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5, numberOfMonths: 3});
			});
		</script>
		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#datepicker2').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
			});
		</script>
	<script>
	$(function() {
		$( "#radio" ).buttonset();
	});
	</script>
<?=form_open()?>
	<p>Choose date from and date to : </p>
	<p>From : <?=form_input(array('name' => 'from_date', 'value' => set_value('from_date'), 'id' => 'datepicker1', 'size' => '30', 'maxlength' => '30'))?>&nbsp;<?=form_error('from_date')?>&nbsp;&nbsp;&nbsp;
	To : <?=form_input(array('name' => 'untill_date', 'value' => set_value('untill_date'), 'id' => 'datepicker2', 'size' => '30', 'maxlength' => '30'))?>&nbsp;<?=form_error('untill_date')?></p>

	<div class="demo"><?=form_submit('test', 'Search')?></div>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<?if($this->form_validation->run() == FALSE):?>
<?else:?>
<p>This is the sale from <?=unix_to_human(mysql_to_unix($start))?> to <?=unix_to_human(mysql_to_unix($end))?></p>
<table border="0" width="100%"  cellspacing="2" cellpadding="2">
	<tr>
		<td><strong>Item</strong></td>
		<td><strong>Quantity</strong></td>
	</tr>
	<?foreach($query->result() as $u):?>
	<tr>
		<td><?=$u->item?></td>
		<td><?=$u->quantity?></td>
	</tr>
	<?endforeach?>
</table>

<?endif?>
<? endblock() ?>


<?end_extend()?>