<?extend('template/main_template.php')?>

<? startblock('logo') ?>
<a href="<?=site_url()?>"><img src="<?=base_url()?>images/logo.png" width="221" height="91" alt="" title="" border="0" /></a>
<? endblock() ?>
	
<? startblock('menu_tab') ?>
<li><?=anchor('', 'home', array('title' => 'home', 'class' => 'nav'))?></li>
<li><?=anchor('report/index', 'report', array('title' => 'report', 'class' => 'nav'))?></li>
<li><?=anchor('coms/logout', 'logout', array('title' => 'logout', 'class' => 'nav'))?></li>
<? endblock() ?>

<? startblock('search') ?>
<input type="text" class="search" value="search" />
<input type="image" src="<?=base_url()?>images/search.gif" class="search_bt" />
<? endblock() ?>

<? startblock('left_menu') ?>
<li><?=anchor('coms/search_order', 'search order', array('title' => 'search order'))?></li>
<li><?=anchor('coms/order_unclose_payment', 'payment pending order ['.$this->view->order_list_view_unclose_pending_payment1()->num_rows().']', array('title' => 'payment pending order ['.$this->view->order_list_view_unclose_pending_payment1()->num_rows().']'))?></li>
<li><?=anchor('coms/order_unclose_delivery', 'delivery pending order ['.$this->view->order_list_view_unclose_pending_delivery1()->num_rows().']', array('title' => 'delivery pending order ['.$this->view->order_list_view_unclose_pending_delivery1()->num_rows().']'))?></li>
<li><?=anchor('coms/order_unclose_both', 'both pending order ['.$this->view->order_list_view_unclose_pending_both1()->num_rows().']', array('title' => 'both pending order ['.$this->view->order_list_view_unclose_pending_both1()->num_rows().']'))?></li>
<li><?=anchor('coms/order_unclose', 'unclose order ['.$this->view->order_list_view_unclose_complete_all1()->num_rows().']', array('title' => 'unclose order ['.$this->view->order_list_view_unclose_complete_all1()->num_rows().']'))?></li>
<li><?=anchor('coms/order_complete', 'complete order ['.$this->view->order_list_view_complete1()->num_rows().']', array('title' => 'complete order ['.$this->view->order_list_view_complete1()->num_rows().']'))?></li>
<li><?=anchor('coms/order', 'new order', array('title' => 'new order'))?></li>
<li><?=anchor('coms/newitem', 'new item', array('title' => 'new item'))?></li>
<li><?=anchor('coms/newsize', 'new size', array('title' => 'new size'))?></li>
<li><?=anchor('coms/newcolor', 'new color', array('title' => 'new color'))?></li>
<li><?=anchor('coms/newbank', 'new bank', array('title' => 'new bank'))?></li>
<li><?=anchor('coms/neworder_method', 'new order method', array('title' => 'new order method'))?></li>
<li><?=anchor('coms/newpayment_mode', 'new payment mode', array('title' => 'new payment mode'))?></li>
<li><?=anchor('coms/newdelivery_type', 'new delivery type', array('title' => 'new delivery type'))?></li>
<li><?=anchor('coms/neworder_type', 'new order type', array('title' => 'new order type'))?></li>
<? endblock() ?>

<? startblock('page_title') ?>
<? endblock() ?>

<? startblock('top_content') ?>
<? endblock() ?>

<? startblock('mid_content') ?>
<? endblock() ?>

<? startblock('bottom_content') ?>
<? endblock() ?>

<? startblock('center_footer') ?>
<a href="#">Shipping Terms</a> | <a href="#">Terms &amp; Conditions</a> | <a href="#">Privacy Policy</a> | <a href="#">Contact</a>
<br /> Page rendered in <strong>{elapsed_time}</strong> seconds using <strong>{memory_usage}</strong>
<? endblock() ?>

<? end_extend() ?>