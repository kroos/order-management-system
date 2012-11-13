<?extend ('details.php')?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>
<p>Choose your order delivery</p>
<h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>



<? startblock('bottom_content') ?>


		<script type="text/javascript" src="<?=base_url()?>js/jquery-ui-timepicker-addon.js"></script>
		<script type="text/javascript">
			$(function(){
				// Datepicker
				$('#datepicker').datetimepicker({dateFormat: "yy-mm-dd", timeFormat: "hh:mm:ss", showSecond: true, showMillisec: false, ampm: false, stepHour: 1, stepMinute: 1, stepSecond: 5});
			});
		</script>


<?=form_open()?>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>
		<div class="product_box">
		<div class="prod_title">Feedback</div>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Order Code</td>
		<td>Feedback</td>
		<td>&nbsp;</td>
	</tr>

	<tr>
		<td><?=$this->uri->segment(3, 0)?><br /><?=form_hidden('order_my_id', $this->uri->segment(3, 0))?></td>
		<td><?=form_textarea(array('name' => 'feedback', 'value' => set_value('feedback'), 'rows' => '5', 'cols' => '20'))?><br /><?=form_error('feedback')?></td>
		<td><div class="demo"><?=form_submit('feed', 'Add')?></div></td>
	</tr>
</table>
		</div>
		</td>
	</tr>
	<tr>
	<td>
<?if ($feedback->num_rows() < 1):?>
<?else:?>
		<div class="product_box">
		<div class="prod_title">Feedback</div>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Order Code</td>
		<td>Feedback</td>
		<td>&nbsp;</td>
	</tr>
	<?foreach($feedback->result() as $b):?>
	<tr>
		<td><?=$b->feedback_id?></td>
		<td><?=$b->order_my_id?></td>
		<td><?=$b->comments?></td>
		<td><div class="demo"><?=anchor('coms/feedbackr/'.$this->uri->segment(3, 0).'/'.$b->feedback_id, 'REMOVE', array('title' => 'Remove ID '.$b->feedback_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
		</div>
<?endif?>
	</td>
	</tr>
	<tr>
	<td><div class="demo"><?=anchor('coms/details/'.$this->uri->segment(3, 0), 'BACK', array())?></div></td>
	</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<?end_extend()?>