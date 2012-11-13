<?extend ('template/base_template.php')?>

<? startblock('page_title') ?>
List Of Order
<? endblock() ?>

<? startblock('top_content') ?>
 <p>This is the list of PENDING ORDER with COMPLETE DELIVERY PROCESS but UNFINISHED PAYMENT PROCESS</p>
<? endblock() ?>

<? startblock('mid_content') ?>

	<script>
	$(function() {
		$( "a", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return true; });
	});
	</script>

<div class="demo"><?=$this->pagination->create_links();?></div>
<table border="0" cellspacing="2" cellpadding="4" width="100%" style="border-collapse: collapse">
	<tr>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px">Order Code</td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px">Date Order</td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px">Method Order</td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px">Client</td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px">Type</td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px">Phone</td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px">Email</td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px">Order Status</td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px">Delete Order</td>
	</tr>
	<?foreach($query->result() as $i):?>
	<tr>
		<?if($i->order_status == 1):?>
			<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><div class="demo"><?=anchor('coms/details/'.$i->order_my_id, $i->order_my_id, array('title' => 'Edit Order Code '.$i->order_my_id))?></div></td>
		<?else:?>
			<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><div class="demo"><?=anchor('#', $i->order_my_id, array('onClick' => "alert( 'Please OPEN the order, then you can edit this order')", 'title' => 'Edit Order Code '.$i->order_my_id))?></div></td>
		<?endif?>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><?=unix_to_human(mysql_to_unix($i->date_order))?></td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><?=$i->method_order?></td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><?=$i->client?></td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><?=$i->type?></td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><?=$i->phone_client?></td>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><?=$i->email_client?></td>
		<?if($i->order_status == 1):?>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><div class="demo"><?=anchor('coms/orderu/'.$i->order_my_id.'/0', 'OPEN')?></div></td>
		<?else :?>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><div class="demo"><?=anchor('coms/orderu/'.$i->order_my_id.'/1', 'CLOSE')?></div></td>
		<?endif?>
		<td align="center" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><div class="demo"><?=anchor('coms/orderdel/'.$i->order_my_id, 'Delete')?></div></td>
	</tr>
	<?php
	$j = $this->order_item->check_item($i->order_my_id);
	$p = $this->payment_info->check_payment($i->order_my_id);
	$l = $this->delivery_info->check_delivery($i->order_my_id);
	?>
	<tr>
	
	<td colspan="2" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><strong>Item</strong><br />
	<?if($j->num_rows() < 1 ):?>
	<p><font color="#FF0000">Item section for this order is incomplete</font></p>
	<?else:?>
	<p><font color="#00FF00">Item section is complete</font></p>
	<?endif?>
	<?$tp=0?>
	<?foreach($j->result() AS $price):?>
	<?$tp += $price->total_price?>
	<?endforeach?>
	<p>Total Price : <strong>RM <?=$tp?></strong></p>
	</td>
	
	<td colspan="2" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><strong>Payment</strong><br />
	<?if($p->num_rows() < 1 ):?>
	<p><font color="#FF0000">Payment section for this order is incomplete</font></p>
	<?else:?>
	<p><font color="#00FF00">Payment section is complete</font></p>

	<?$lq = 0?>
	<?foreach($p->result() as $l2):?>
	<?$lq += $l2->total_payment?>
	<?endforeach?>
	<p>Total Payment : <strong>RM <?=$lq?></strong></p>

	<?endif?>
	</td>
	
	<td colspan="2" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><strong>Delivery</strong><br />
	<?if($l->num_rows() < 1 ):?>
	<p><font color="#FF0000">Delivery section for this order is incomplete</font></p>
	<?else:?>
	<p><font color="#00FF00">Delivery section is complete</font></p>
	<?endif?>
	</td>
	
	<td colspan="3" style="border-right-style: solid; border-left-style: solid; border-top-style: solid; border-bottom-style: solid; border-width: 1px"><strong>Time span not complete</strong><br />
	<?if ($i->order_status == 1):?>
	<p><font color="#FF0000"><?=timespan(mysql_to_unix($i->date_order), now())?></font></p>
	<?else:?>
	<p><font color="#00FF00">Complete Order</font></p>
	<?endif?>
	</td>
	</tr>
	<tr>
	<td colspan="9" style="border-right-style: none; border-left-style: none; border-top-style: solid; border-bottom-style: solid; border-width: 1px">&nbsp;</td>
	</tr>
	<?endforeach?>
</table>
<? endblock() ?>

<? startblock('bottom_content') ?>
<? endblock() ?>

<?end_extend()?>