<?extend ('template/base_template.php')?>

<? startblock('left_menu') ?>
<li><?=anchor('coms/order', 'new order', array('title' => 'new order'))?></li>
<? endblock() ?>

<? startblock('page_title') ?>
New Order
<? endblock() ?>

<? startblock('top_content') ?>

	<script>
	$(function() {
		$( "input:submit, a, button", ".demo" ).button();
		$( "a", ".demo" ).click(function() { return true; });
	});
	</script>


 <p>Choose your client, if he/she not exist, pls add him/her <div class="demo"><?=anchor('coms/client', '<b>here : new client</b>', array('title' => 'new client'))?></div></p>
 <h2><font color="#FF0000"><blink><?=@$info?></blink></font></h2>
<? endblock() ?>

<? startblock('mid_content') ?>
<table border="0" cellpadding="2" width="100%">
<tr>
<?=form_open()?>
<td>Type "all" without quotes to see the list of the client.<br />Search Client : <?=form_input(array('name' => 'search', 'size' => '30', 'maxlength' => '30'))?>&nbsp;<?=form_error('search')?>&nbsp;<div class="demo"><?=form_submit('search_btn', 'Search')?></div></td>
<?=form_close()?>
</tr>
</table>
<p>&nbsp;</p>
<?if ($this->input->post('search') != NULL):?>

<?if($clienta->num_rows() < 1 && $clientb->num_rows() < 1 && $clientc->num_rows() < 1 && $clientd->num_rows() < 1 && $cliente->num_rows() < 1 && $clientf->num_rows() < 1 && $clientg->num_rows() < 1 && $clienth->num_rows() < 1 && $clienti->num_rows() < 1 && $clientj->num_rows() < 1 && $clientk->num_rows() < 1 && $clientl->num_rows() < 1 && $clientm->num_rows() < 1 && $clientn->num_rows() < 1 && $cliento->num_rows() < 1 && $clientp->num_rows() < 1 && $clientq->num_rows() < 1 && $clientr->num_rows() < 1 && $clients->num_rows() < 1 && $clientt->num_rows() < 1 && $clientu->num_rows() < 1 && $clientv->num_rows() < 1 && $clientw->num_rows() < 1 && $clientx->num_rows() < 1 && $clienty->num_rows() < 1 && $clientz->num_rows() < 1 ):?>
<p>Sorry, I cant find client <?=$this->input->post('search')?></p>
<?else:?>
<table border="0" cellpadding="2" width="100%">
	<tr>
		<td>Client</td>
		<td>Address</td>
		<td>Phone</td>
		<td>Email</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?if($clienta->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>A</h2></td>
	</tr>
	<?foreach($clienta->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title= "Proceed Order with Client '.$i->client_id.'"')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
		</tr>
	<?endforeach?>
	<?endif?>


	<?if($clientb->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>B</h2></td>
	</tr>
	<?foreach($clientb->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientc->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>C</h2></td>
	</tr>
	<?foreach($clientc->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientd->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>D</h2></td>
	</tr>
	<?foreach($clientd->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($cliente->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>E</h2></td>
	</tr>
	<?foreach($cliente->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientf->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>F</h2></td>
	</tr>
	<?foreach($clientf->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientg->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>G</h2></td>
	</tr>
	<?foreach($clientg->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clienth->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>H</h2></td>
	</tr>
	<?foreach($clienth->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clienti->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>I</h2></td>
	</tr>
	<?foreach($clienti->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientj->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>J</h2></td>
	</tr>
	<?foreach($clientj->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientk->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>K</h2></td>
	</tr>
	<?foreach($clientk->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientl->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>L</h2></td>
	</tr>
	<?foreach($clientl->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientm->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>M</h2></td>
	</tr>
	<?foreach($clientm->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientn->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>N</h2></td>
	</tr>
	<?foreach($clientn->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($cliento->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>O</h2></td>
	</tr>
	<?foreach($cliento->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientp->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>P</h2></td>
	</tr>
	<?foreach($clientp->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientq->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>Q</h2></td>
	</tr>
	<?foreach($clientq->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientr->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>R</h2></td>
	</tr>
	<?foreach($clientr->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clients->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>S</h2></td>
	</tr>
	<?foreach($clients->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientt->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>T</h2></td>
	</tr>
	<?foreach($clientt->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientu->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>U</h2></td>
	</tr>
	<?foreach($clientu->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientv->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>V</h2></td>
	</tr>
	<?foreach($clientv->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientw->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>W</h2></td>
	</tr>
	<?foreach($clientw->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientx->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>X</h2></td>
	</tr>
	<?foreach($clientx->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clienty->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>Y</h2></td>
	</tr>
	<?foreach($clienty->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>

	<?if($clientz->num_rows() < 1):?>
	<?else:?>
	<tr>
	<td colspan="5"><h2>Z</h2></td>
	</tr>
	<?foreach($clientz->result() as $i):?>
	<tr>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/orderdetail/'.$i->client_id, $i->client, 'title='.$i->client_id);?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->address_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->phone_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><?=$i->email_client?></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientu/'.$i->client_id, 'Edit')?></div></td>
		<td style="border-bottom-style: solid; border-bottom-width: 1px"><div class="demo"><?=anchor('coms/clientr/'.$i->client_id, 'Remove')?></div></td>
	</tr>
	<?endforeach?>
	<?endif?>



</table>
<?endif?>
<?endif?>

<? endblock() ?>

<? startblock('bottom_content') ?>
<? endblock() ?>

<?end_extend()?>