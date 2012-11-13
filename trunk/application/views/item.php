<?extend ('details.php')?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>
<p>Choose your order items</p>
<h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<?endblock()?>

<? startblock('bottom_content') ?>
<?=form_open()?>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>
		<div class="product_box">
		<div class="prod_title">Item</div>
		<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse" class="autoTable">
			<tr>
				<td>Order Code</td>
				<td>Item</td>
				<td>Size</td>
				<td>Color</td>
				<td>Quantity</td>
				<td>Discount</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
<?php
foreach($item->result() as $i)
	{
		$item1[$i->item_id] = $i->item.' = RM'.$i->price;
	}
foreach($size->result() as $s)
	{
		$size1[$s->size_id] = $s->size;
	}
foreach($color->result() as $c)
	{
		$color1[$c->color_id] = $c->color;
	}
?>
			<tr>
				<td><?=$this->uri->segment(3, 0)?><?=form_hidden('order_my_id', $this->uri->segment(3, 0))?><br /><?=form_error('order_my_id')?></td>
				<td><?=form_dropdown('item', $item1)?><br /><?=form_error('item')?></td>
				<td><?=form_dropdown('size', $size1)?><br /><?=form_error('size')?></td>
				<td><?=form_dropdown('color', $color1)?><br /><?=form_error('color')?></td>
				<td><?=form_input(array('name' => 'quantity', 'value' => set_value('quantity'), 'maxlength' => '3', 'size' => '3'))?><br /><?=form_error('quantity')?></td>
				<td>RM <?=form_input(array('name' => 'discount', 'value' => set_value('discount'), 'maxlength' => '4', 'size' => '4'))?><br /><?=form_error('discount')?></td>
				<td>&nbsp;</td>
				<td><div class="demo"><?=form_submit('item_info', 'Add')?></div></td>
			</tr>
		</table>
		</div>
		</td>
	</tr>
<tr>
	<td align="right">
	</td>
</tr>
<tr>
<td>
		<div class="product_box">
		<div class="prod_title">Item</div>
<table  border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
			<tr>
				<td>Order Item ID</td>
				<td>Order Code</td>
				<td>Item</td>
				<td>Size</td>
				<td>Color</td>
				<td>Quantity</td>
				<td>Unit Price</td>
				<td>Discount</td>
				<td>Total Price</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<?foreach($item_list->result() as $b):?>
			<tr>
				<td><?=$b->id?></td>
				<td><?=$b->order_my_id?></td>
				<td><?=$b->item?></td>
				<td><?=$b->size?></td>
				<td><?=$b->color?></td>
				<td><?=$b->quantity?></td>
				<td><?=$b->price?></td>
				<td>RM <?=$b->discount?></td>
				<td><?=$b->total_price?></td>
				<td><div class="demo"><?=anchor('coms/exchange/'.$this->uri->segment(3, 0).'/'.$b->id, 'Exchange', array('title' => 'Exchange ID '.$b->id))?></div></td>
				<td><div class="demo"><?=anchor('coms/itemr/'.$this->uri->segment(3, 0).'/'.$b->id, 'REMOVE', array('title' => 'Remove ID '.$b->id))?></div></td>
			</tr>
			<tr>
			<td colspan="12">
<?if($this->view->exchange_view($b->id)->num_rows() < 1):?>
<?else:?>
		<div class="product_box">
		<div class="prod_title">Exchange</div>
<table border="0" cellpadding="2" width="100%" style="border-collapse: collapse">
	<tr>
		<td>Exchange ID</td>
		<td>Order Item ID</td>
		<td>Exchange Status</td>
		<td>Return Tracking No</td>
		<td>Exchange Date</td>
		<td>Size</td>
		<td>Remarks</td>
		<td>&nbsp;</td>
	</tr>
	<?foreach($this->view->exchange_view($b->id)->result() as $b):?>
	<tr>
		<td><?=$b->exchange_id?></td>
		<td><?=$b->id?></td>
		<?if($b->exchange_approve == 1):?>
		<td>Approve</td>
		<?else:?>
		<td> Not Approve</td>
		<?endif?>
		<td><?=$b->return_tracking_no?></td>
		<td><?=unix_to_human(mysql_to_unix($b->date_exchange))?></td>
		<td><?=$b->size?></td>
		<td><?=$b->remarks?></td>
		<td><div class="demo"><?=anchor('coms/exchanger/'.$this->uri->segment(3, 0).'/'.$this->uri->segment(4, 0).'/'.$b->exchange_id, 'REMOVE', array('title' => 'Remove ID '.$b->exchange_id))?></div></td>
	</tr>
	<?endforeach?>
</table>
		</div>
<?endif?>
			</td>
			</tr>
			<?endforeach?>
</table>
</div>
</td>
</tr>
<tr>
<td><div class="demo"><?=anchor('coms/details/'.$this->uri->segment(3, 0), 'BACK', array())?></div></td>
</tr>
</table>
<?=form_close()?>
<? endblock() ?>

<?end_extend()?>