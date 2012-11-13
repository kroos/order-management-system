<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
List Of Order
<? endblock() ?>

<? startblock('top_content') ?>
 <p>Please insert the date from untill any date and the status order</p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>


	<link rel="stylesheet" href="<?=base_url()?>css/jquery.ui.all.css">
<!--	<script src="<?=base_url()?>js/jquery-1.7.1.js"></script>		-->
	<script src="<?=base_url()?>js/ui/jquery.ui.core.js"></script>
	<script src="<?=base_url()?>js/ui/jquery.ui.widget.js"></script>
	<script src="<?=base_url()?>js/ui/jquery.ui.button.js"></script>
	<script>
	$(function() {
		$( "#radio" ).buttonset();
	});
	</script>

	<script>
	$(function() {
		$( "input:submit, a, button", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return false; });
	});
	</script>

		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#datepicker12').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5, numberOfMonths: 3});
			});
		</script>
		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#datepicker1').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
			});
		</script>

<?=form_open()?>
	<p>Choose date from and date to : </p>
	<p>From : <?=form_input(array('name' => 'from_date', 'value' => set_value('from_date'), 'id' => 'datepicker12', 'size' => '30', 'maxlength' => '30'))?>&nbsp;<?=form_error('from_date')?>&nbsp;&nbsp;&nbsp;
	To : <?=form_input(array('name' => 'untill_date', 'value' => set_value('untill_date'), 'id' => 'datepicker1', 'size' => '30', 'maxlength' => '30'))?>&nbsp;<?=form_error('untill_date')?></p>
	<div id="radio">
		<p>Choose Order Status</p>
		<?=form_radio('order_status', '1', FALSE, 'id="radio0"')?><?=form_label('Order Status OPEN', 'radio0')?>
		<?=form_radio('order_status', '0', FALSE, 'id="radio1"')?><?=form_label('Order Status CLOSE', 'radio1')?>
		<?=form_radio('order_status', '2', FALSE, 'id="radio2"')?><?=form_label('BOTH', 'radio2')?>&nbsp;<?=form_error('order_status')?>&nbsp;

	</div>
	
	<div class="demo">
	<?=form_submit('test', 'Search')?>
	</div>
<?=form_close()?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<? endblock() ?>

<?end_extend()?>