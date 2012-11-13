<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class View extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//this is a view for order
		function order_list_view()
			{
				return $this->db->query('select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`))) order by `order_my`.`order_status` DESC,`order_my`.`date_order` DESC');
			}

		function item_list()
			{
				return $this->db->query('select `order_item`.`order_my_id` AS `order_my_id`,`item`.`item` AS `item`,`item`.`price` AS `price`,`size`.`size` AS `size`,`color`.`color` AS `color`,`order_item`.`quantity` AS `quantity`,`order_item`.`discount` AS `discount`,`order_item`.`total_price` AS `total_price`,`order_item`.`id` AS `id` from (((`order_item` join `item` on((`item`.`item_id` = `order_item`.`item_id`))) join `size` on((`size`.`size_id` = `order_item`.`size_id`))) join `color` on((`color`.`color_id` = `order_item`.`color_id`)))');
			}

		function order_item_view($order_my_id)
			{
			 return $this->db->query("select `order_item`.`id` AS `id`,`order_item`.`order_my_id` AS `order_my_id`,`order_item`.`quantity` AS `quantity`,`order_item`.`discount` AS `discount`,`order_item`.`total_price` AS `total_price`,`item`.`item` AS `item`,`item`.`price` AS `price`,`size`.`size` AS `size`,`color`.`color` AS `color` from (((`order_item` join `item` on((`item`.`item_id` = `order_item`.`item_id`))) join `size` on((`size`.`size_id` = `order_item`.`size_id`))) join `color` on((`color`.`color_id` = `order_item`.`color_id`))) where (`order_item`.`order_my_id` = $order_my_id) order by `order_item`.`id`");
			}

		function order_payment_view($order_id)
			{
				return $this->db->query("select `payment_info`.`payment_info_id` AS `payment_info_id`,`payment_info`.`order_my_id` AS `order_my_id`,`bank`.`bank` AS `bank`,`payment_info`.`total_payment` AS `total_payment`,`mode_payment`.`mode_payment` AS `mode_payment`,`payment_info`.`date_payment` AS `date_payment`,`payment_info`.`ref_no` AS `ref_no` from ((`payment_info` join `mode_payment` on((`mode_payment`.`mode_payment_id` = `payment_info`.`mode_payment_id`))) join `bank` on((`bank`.`bank_id` = `payment_info`.`bank_id`))) where (`payment_info`.`order_my_id` = $order_id) order by `payment_info`.`payment_info_id`");
			}
			
		function order_delivery_view($rt)
			{
				return $this->db->query("select `order_my`.`order_my_id` AS `order_my_id`,`delivery_info`.`delivery_info_id` AS `delivery_info_id`,`delivery_type`.`delivery_type` AS `delivery_type`,`delivery_info`.`delivery_date` AS `delivery_date`,`delivery_info`.`tracking_no` AS `tracking_no`,`delivery_info`.`delivered_by` AS `delivered_by`
											FROM
											((order_my
											INNER JOIN delivery_info ON ((delivery_info.order_my_id = order_my.order_my_id)))
											INNER JOIN delivery_type ON ((delivery_type.delivery_type_id = delivery_info.delivery_type_id)))
											where (`order_my`.`order_my_id` = $rt)
											");
			}
			
		function exchange_view($yui)
			{
				return $this->db->query("select `exchange`.`exchange_id` AS `exchange_id`,`exchange`.`id` AS `id`,`exchange`.`exchange_approve` AS `exchange_approve`,`exchange`.`return_tracking_no` AS `return_tracking_no`,`exchange`.`date_exchange` AS `date_exchange`,`exchange`.`remarks` AS `remarks`,`size`.`size` AS `size` from (`exchange` join `size` on((`size`.`size_id` = `exchange`.`size_id`))) where (`exchange`.`id` = $yui)");
			}

		function order_summary_view($order)
			{
				return $this->db->query("select `order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`item`.`item` AS `item`,`size`.`size` AS `size`,`color`.`color` AS `color`,`order_item`.`quantity` AS `quantity`,`order_item`.`total_price` AS `total_price`,`bank`.`bank` AS `bank`,`payment_info`.`total_payment` AS `total_payment`,`payment_info`.`date_payment` AS `date_payment`,`delivery_type`.`delivery_type` AS `delivery_type`,`delivery_info`.`delivery_date` AS `delivery_date`,`delivery_info`.`tracking_no` AS `tracking_no`,`delivery_info`.`delivered_by` AS `delivered_by` from (((((((((`order_my` left join `order_item` on((`order_item`.`order_my_id` = `order_my`.`order_my_id`))) left join `payment_info` on((`payment_info`.`order_my_id` = `order_my`.`order_my_id`))) left join `item` on((`item`.`item_id` = `order_item`.`item_id`))) left join `delivery_info` on((`delivery_info`.`order_my_id` = `order_my`.`order_my_id`))) left join `delivery_type` on((`delivery_type`.`delivery_type_id` = `delivery_info`.`delivery_type_id`))) left join `bank` on((`bank`.`bank_id` = `payment_info`.`bank_id`))) left join `color` on((`color`.`color_id` = `order_item`.`color_id`))) left join `size` on((`size`.`size_id` = `order_item`.`size_id`))) left join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) where (`order_my`.`order_my_id` = $order)");
			}
			
		function item_where_view($order_my_id)
			{
				return $this->db->query("select `order_item`.`order_my_id` AS `order_my_id`,`item`.`item` AS `item`,`item`.`price` AS `price`,`size`.`size` AS `size`,`color`.`color` AS `color`,`order_item`.`quantity` AS `quantity`,`order_item`.`discount` AS `discount`,`order_item`.`total_price` AS `total_price`,`order_item`.`id` AS `id` from (((`order_item` join `item` on((`item`.`item_id` = `order_item`.`item_id`))) join `size` on((`size`.`size_id` = `order_item`.`size_id`))) join `color` on((`color`.`color_id` = `order_item`.`color_id`))) where (`order_item`.`order_my_id` = $order_my_id) order by `order_item`.`id`");
			}
			
		function order_where_summary_view($order_my_id)
			{
				return $this->db->query("select `order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`bank`.`bank` AS `bank`,`payment_info`.`total_payment` AS `total_payment`,`payment_info`.`date_payment` AS `date_payment`,`delivery_type`.`delivery_type` AS `delivery_type`,`delivery_info`.`delivery_date` AS `delivery_date`,`delivery_info`.`tracking_no` AS `tracking_no`,`delivery_info`.`delivered_by` AS `delivered_by` from (((((`order_my` left join `payment_info` on((`payment_info`.`order_my_id` = `order_my`.`order_my_id`))) left join `delivery_info` on((`delivery_info`.`order_my_id` = `order_my`.`order_my_id`))) left join `delivery_type` on((`delivery_type`.`delivery_type_id` = `delivery_info`.`delivery_type_id`))) left join `bank` on((`bank`.`bank_id` = `payment_info`.`bank_id`))) left join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) where (`order_my`.`order_my_id` = $order_my_id)");
			}

		function delivery_info_view($order_my_id)
			{
				return $this->db->query("select `delivery_info`.`delivery_info_id` AS `delivery_info_id`,`delivery_info`.`order_my_id` AS `order_my_id`,`delivery_type`.`delivery_type` AS `delivery_type`,`delivery_info`.`delivery_date` AS `delivery_date`,`delivery_info`.`tracking_no` AS `tracking_no`,`delivery_info`.`delivered_by` AS `delivered_by` from (`delivery_info` join `delivery_type` on((`delivery_type`.`delivery_type_id` = `delivery_info`.`delivery_type_id`))) where (`delivery_info`.`order_my_id` = $order_my_id)");
			}

		function order_list_view_status($order_status, $date_start, $date_end)
			{
				return $this->db->query("
											select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status`
											from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
											WHERE
											order_my.order_status = '$order_status' AND
											order_my.date_order BETWEEN '$date_start' AND '$date_end'
											order by `order_my`.`order_status` DESC,`order_my`.`date_order` DESC
										");
			}

		function order_list_view_nostatus($date_start, $date_end, $num, $offset)
			{
				return $this->db->query("
											select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status`
											from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
											WHERE
											order_my.date_order BETWEEN '$date_start' AND '$date_end'
											order by `order_my`.`order_status` DESC,`order_my`.`date_order` DESC LIMIT ".$offset.", ".$num."
										");
			}

		function order_list_view_page($num, $offset)
			{
				return $this->db->query("select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`))) order by `order_my`.`order_status` DESC,`order_my`.`date_order` DESC LIMIT ".$offset.", ".$num."");
			}

		function sale_view($from, $to)
			{
				//select `order_my`.`order_my_id` AS `order_my_id`,`order_item`.`total_price` AS `total_price`,`order_my`.`date_order` AS `date_order`,`order_item`.`item_id` AS `item_id`,`item`.`item` AS `item` from ((`order_my` join `order_item` on((`order_item`.`order_my_id` = `order_my`.`order_my_id`))) join `item` on((`item`.`item_id` = `order_item`.`item_id`))) where ((`order_my`.`date_order` between '2012-01-01 00:00:00' and '2012-06-01 00:00:00') and (`order_item`.`item_id` <> 12) and (`order_item`.`item_id` <> 13)) order by `order_my`.`date_order` desc
				return $this->db->query("select `order_my`.`order_my_id` AS `order_my_id`,`order_item`.`total_price` AS `total_price`,`order_my`.`date_order` AS `date_order`,`order_item`.`item_id` AS `item_id`,`item`.`item` AS `item` from ((`order_my` join `order_item` on((`order_item`.`order_my_id` = `order_my`.`order_my_id`))) join `item` on((`item`.`item_id` = `order_item`.`item_id`))) where ((`order_my`.`date_order` between '$from' and '$to') and (`order_item`.`item_id` <> 12) and (`order_item`.`item_id` <> 13)) order by `order_my`.`date_order` desc");
			}

		function topitem($from, $to)
			{
				return $this->db->query("SELECT
										Sum(T.quantity) as quantity,
										T.item,
										T.item_id
										FROM
										(select `item`.`item` AS `item`,`order_item`.`quantity` AS `quantity`,`item`.`item_id` AS `item_id` from ((`order_my` join `order_item` on((`order_my`.`order_my_id` = `order_item`.`order_my_id`))) join `item` on((`order_item`.`item_id` = `item`.`item_id`))) where (`order_my`.`date_order` between '$from' and '$to')) AS T
										GROUP BY
										item_id
										order by
										quantity DESC");
			}

		function order_list_view_complete($num, $offset)
			{
				return $this->db->query("
										select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status`
										from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`)))
										join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type`
										on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
										where (`order_my`.`order_status` = 0)
										order by `order_my`.`order_status` desc,`order_my`.`date_order` desc
										LIMIT ".$offset.", ".$num."
										");
			}

		function order_list_view_complete1()
			{
				return $this->db->query("
										select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status`
										from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`)))
										join `client` on((`client`.`client_id` = `order_my`.`client_id`)))
										join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
										where (`order_my`.`order_status` = 0)
										order by `order_my`.`order_status` desc,`order_my`.`date_order` desc
										");
			}

		function order_list_view_unclose()
			{
				return $this->db->query("
										select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status`
										from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`)))
										join `client` on((`client`.`client_id` = `order_my`.`client_id`)))
										join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
										where (`order_my`.`order_status` = 1)
										order by `order_my`.`order_status` desc,`order_my`.`date_order` desc
										");
			}

		function order_list_view_unclose_complete_item()
			{
				return $this->db->query('
											SELECT
											item_complete.order_my_id,
											item_complete.date_order,
											item_complete.method_order,
											item_complete.client,
											item_complete.type,
											item_complete.phone_client,
											item_complete.email_client,
											item_complete.order_status,
											Count(order_item.id)
											FROM
											(
												select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status`
												from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`)))
												join `client` on((`client`.`client_id` = `order_my`.`client_id`)))
												join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
												where (`order_my`.`order_status` = 1)
												order by `order_my`.`order_status` desc,`order_my`.`date_order` desc
											)
											AS item_complete
											INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
											GROUP BY
											item_complete.order_my_id,
											item_complete.date_order,
											item_complete.method_order,
											item_complete.client,
											item_complete.type,
											item_complete.phone_client,
											item_complete.email_client,
											item_complete.order_status
										');
			}

		function order_list_view_unclose_complete_all1()
			{
				return $this->db->query('
											SELECT
											complete_all.order_my_id,
											complete_all.date_order,
											complete_all.method_order,
											complete_all.client,
											complete_all.type,
											complete_all.phone_client,
											complete_all.email_client,
											complete_all.order_status,
											complete_all.`Count(order_item.id)`,
											Count(delivery_info.delivery_info_id),
											Count(payment_info.payment_info_id)
											FROM
											(	SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`))) where (`order_my`.`order_status` = 1) order by `order_my`.`order_status` desc,`order_my`.`date_order` desc) AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status) AS complete_all
											INNER JOIN delivery_info ON complete_all.order_my_id = delivery_info.order_my_id
											INNER JOIN payment_info ON complete_all.order_my_id = payment_info.order_my_id
											GROUP BY
											complete_all.order_my_id,
											complete_all.date_order,
											complete_all.method_order,
											complete_all.client,
											complete_all.type,
											complete_all.phone_client,
											complete_all.email_client,
											complete_all.order_status,
											complete_all.`Count(order_item.id)`
											ORDER BY
											complete_all.date_order DESC
										');
			}

		function order_list_view_unclose_complete_all2($num, $offset)
			{
				return $this->db->query("
											SELECT
											complete_all.order_my_id,
											complete_all.date_order,
											complete_all.method_order,
											complete_all.client,
											complete_all.type,
											complete_all.phone_client,
											complete_all.email_client,
											complete_all.order_status,
											complete_all.`Count(order_item.id)`,
											Count(delivery_info.delivery_info_id),
											Count(payment_info.payment_info_id)
											FROM
											(	SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(
													select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status`
													from (((`order_my` join `method_order`
													on((`method_order`.`method_order_id` = `order_my`.`method_order_id`)))
													join `client` on((`client`.`client_id` = `order_my`.`client_id`)))
													join `order_type`
													on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
													where (`order_my`.`order_status` = 1)
													order by `order_my`.`order_status` desc,`order_my`.`date_order` desc
												)
												AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status) AS complete_all
											INNER JOIN delivery_info ON complete_all.order_my_id = delivery_info.order_my_id
											INNER JOIN payment_info ON complete_all.order_my_id = payment_info.order_my_id
											GROUP BY
											complete_all.order_my_id,
											complete_all.date_order,
											complete_all.method_order,
											complete_all.client,
											complete_all.type,
											complete_all.phone_client,
											complete_all.email_client,
											complete_all.order_status,
											complete_all.`Count(order_item.id)`
											ORDER BY
											complete_all.date_order DESC
											LIMIT ".$offset.", ".$num."
										");
			}

		function order_list_view_unclose_pending_delivery1()
			{
				return $this->db->query('
											SELECT
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`,
											Count(payment_info.payment_info_id),
											Count(delivery_info.delivery_info_id)
											FROM
											(
												SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(
													select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status`
													from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`)))
													join `client` on((`client`.`client_id` = `order_my`.`client_id`)))
													join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
													where (`order_my`.`order_status` = 1)
													order by `order_my`.`order_status` desc,`order_my`.`date_order` desc
												)
												AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status
											) AS order_list_view_pending_item
											INNER JOIN payment_info ON order_list_view_pending_item.order_my_id = payment_info.order_my_id
											LEFT JOIN delivery_info ON order_list_view_pending_item.order_my_id = delivery_info.order_my_id
											GROUP BY
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`
											HAVING
											Count(delivery_info.delivery_info_id) = 0
											ORDER BY
											order_list_view_pending_item.date_order DESC
										');
			}

		function order_list_view_unclose_pending_delivery2($num, $offset)
			{
				return $this->db->query("
											SELECT
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`,
											Count(payment_info.payment_info_id),
											Count(delivery_info.delivery_info_id)
											FROM
											(
												SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`))) where (`order_my`.`order_status` = 1) order by `order_my`.`order_status` desc,`order_my`.`date_order` desc) AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status
											) AS order_list_view_pending_item
											INNER JOIN payment_info ON order_list_view_pending_item.order_my_id = payment_info.order_my_id
											LEFT JOIN delivery_info ON order_list_view_pending_item.order_my_id = delivery_info.order_my_id
											GROUP BY
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`
											HAVING
											Count(delivery_info.delivery_info_id) = 0
											ORDER BY
											order_list_view_pending_item.date_order DESC
											LIMIT ".$offset.", ".$num."
										");
			}

		function order_list_view_unclose_pending_payment1()
			{
				return $this->db->query('
											SELECT
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`,
											Count(payment_info.payment_info_id),
											Count(delivery_info.delivery_info_id)
											FROM
											(
												SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`))) where (`order_my`.`order_status` = 1) order by `order_my`.`order_status` desc,`order_my`.`date_order` desc) AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status
											) AS order_list_view_pending_item
											INNER JOIN delivery_info ON delivery_info.order_my_id = order_list_view_pending_item.order_my_id
											LEFT JOIN payment_info ON payment_info.order_my_id = order_list_view_pending_item.order_my_id
											GROUP BY
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`
											HAVING
											Count(payment_info.payment_info_id) = 0
											ORDER BY
											order_list_view_pending_item.date_order DESC
										');
			}

		function order_list_view_unclose_pending_payment2($num, $offset)
			{
				return $this->db->query("
											SELECT
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`,
											Count(payment_info.payment_info_id),
											Count(delivery_info.delivery_info_id)
											FROM
											(
												SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`))) where (`order_my`.`order_status` = 1) order by `order_my`.`order_status` desc,`order_my`.`date_order` desc) AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status
											) AS order_list_view_pending_item
											INNER JOIN delivery_info ON delivery_info.order_my_id = order_list_view_pending_item.order_my_id
											LEFT JOIN payment_info ON payment_info.order_my_id = order_list_view_pending_item.order_my_id
											GROUP BY
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`
											HAVING
											Count(payment_info.payment_info_id) = 0
											ORDER BY
											order_list_view_pending_item.date_order DESC
											LIMIT ".$offset.", ".$num."
										");
			}

		function order_list_view_unclose_pending_both1()
			{
				return $this->db->query('
											SELECT
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`,
											Count(payment_info.payment_info_id),
											Count(delivery_info.delivery_info_id)
											FROM
											(
												SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`))) join `client` on((`client`.`client_id` = `order_my`.`client_id`))) join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`))) where (`order_my`.`order_status` = 1) order by `order_my`.`order_status` desc,`order_my`.`date_order` desc) AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status
											) AS order_list_view_pending_item
											LEFT JOIN delivery_info ON order_list_view_pending_item.order_my_id = delivery_info.order_my_id
											LEFT JOIN payment_info ON order_list_view_pending_item.order_my_id = payment_info.order_my_id
											GROUP BY
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`
											HAVING
											Count(delivery_info.delivery_info_id) = 0 AND
											Count(payment_info.payment_info_id) = 0
											ORDER BY
											order_list_view_pending_item.date_order DESC
										');
			}

		function order_list_view_unclose_pending_both2($num, $offset)
			{
				return $this->db->query("
											SELECT
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`,
											Count(payment_info.payment_info_id),
											Count(delivery_info.delivery_info_id)
											FROM
											(
												SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(
													select `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status`
													from (((`order_my` join `method_order` on((`method_order`.`method_order_id` = `order_my`.`method_order_id`)))
													join `client`
													on((`client`.`client_id` = `order_my`.`client_id`)))
													join `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
													where (`order_my`.`order_status` = 1)
													order by `order_my`.`order_status` desc,`order_my`.`date_order` desc
												)
												AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status
											) AS order_list_view_pending_item
											LEFT JOIN delivery_info ON order_list_view_pending_item.order_my_id = delivery_info.order_my_id
											LEFT JOIN payment_info ON order_list_view_pending_item.order_my_id = payment_info.order_my_id
											GROUP BY
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`
											HAVING
											Count(delivery_info.delivery_info_id) = 0 AND
											Count(payment_info.payment_info_id) = 0
											ORDER BY
											order_list_view_pending_item.date_order DESC
											LIMIT ".$offset.", ".$num."
										");
			}

		function topsize($from, $to)
			{
				return $this->db->query("
											SELECT
											top_size.item,
											top_size.size,
											Count(top_size.size_id) AS quantity
											FROM
											(
												SELECT
												`item`.`item` AS `item`,
												`size`.`size` AS `size`,
												`size`.`size_id` AS `size_id`,
												`item`.`item_id` AS `item_id`
												FROM
												(((`order_my` JOIN `order_item` on((`order_item`.`order_my_id` = `order_my`.`order_my_id`)))
												JOIN `size` on((`size`.`size_id` = `order_item`.`size_id`)))
												JOIN `item` on((`item`.`item_id` = `order_item`.`item_id`)))
												WHERE (`order_my`.`date_order` between '$from' and '$to')
											) AS top_size
											WHERE
											top_size.size_id <> 13
											GROUP BY
											top_size.item,
											top_size.size
											ORDER BY
											top_size.size_id DESC
										");
			}

		function getClientnDate($id, $fdate, $tdate)
			{
				return $this->db->query("
											SELECT
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`,
											Count(payment_info.payment_info_id),
											Count(delivery_info.delivery_info_id)
											FROM
											(
												SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(SELECT `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` 
													FROM (((`order_my` JOIN `method_order` ON((`method_order`.`method_order_id` = `order_my`.`method_order_id`)))
													JOIN `client` ON((`client`.`client_id` = `order_my`.`client_id`)))
													JOIN `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
													WHERE (`client`.`client_id` = $id)
															AND (`order_my`.`date_order` BETWEEN \"$fdate\" AND \"$tdate\")
															ORDER BY `order_my`.`order_status` DESC,`order_my`.`date_order` DESC) AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status
											) AS order_list_view_pending_item
											INNER JOIN payment_info ON order_list_view_pending_item.order_my_id = payment_info.order_my_id
											LEFT JOIN delivery_info ON order_list_view_pending_item.order_my_id = delivery_info.order_my_id
											GROUP BY
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`
											ORDER BY
											order_list_view_pending_item.date_order DESC
										");
			}

		function getClientnDatenStatus($id, $fdate, $tdate, $stat)
			{
				return $this->db->query("
											SELECT
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`,
											Count(payment_info.payment_info_id),
											Count(delivery_info.delivery_info_id)
											FROM
											(
												SELECT
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status,
												Count(order_item.id)
												FROM
												(SELECT `order_my`.`order_my_id` AS `order_my_id`,`order_my`.`date_order` AS `date_order`,`method_order`.`method_order` AS `method_order`,`client`.`client` AS `client`,`order_type`.`type` AS `type`,`client`.`phone_client` AS `phone_client`,`client`.`email_client` AS `email_client`,`order_my`.`order_status` AS `order_status` 
													FROM (((`order_my` JOIN `method_order` ON((`method_order`.`method_order_id` = `order_my`.`method_order_id`)))
													JOIN `client` ON((`client`.`client_id` = `order_my`.`client_id`)))
													JOIN `order_type` on((`order_type`.`order_type_id` = `order_my`.`order_type_id`)))
													WHERE (`order_my`.`order_status` = $stat)
															AND (`client`.`client_id` = $id)
															AND (`order_my`.`date_order` BETWEEN \"$fdate\" AND \"$tdate\")
															ORDER BY `order_my`.`order_status` DESC,`order_my`.`date_order` DESC) AS item_complete
												INNER JOIN order_item ON order_item.order_my_id = item_complete.order_my_id
												GROUP BY
												item_complete.order_my_id,
												item_complete.date_order,
												item_complete.method_order,
												item_complete.client,
												item_complete.type,
												item_complete.phone_client,
												item_complete.email_client,
												item_complete.order_status
											) AS order_list_view_pending_item
											INNER JOIN payment_info ON order_list_view_pending_item.order_my_id = payment_info.order_my_id
											LEFT JOIN delivery_info ON order_list_view_pending_item.order_my_id = delivery_info.order_my_id
											GROUP BY
											order_list_view_pending_item.order_my_id,
											order_list_view_pending_item.date_order,
											order_list_view_pending_item.method_order,
											order_list_view_pending_item.client,
											order_list_view_pending_item.type,
											order_list_view_pending_item.phone_client,
											order_list_view_pending_item.email_client,
											order_list_view_pending_item.order_status,
											order_list_view_pending_item.`Count(order_item.id)`
											ORDER BY
											order_list_view_pending_item.date_order DESC
										");
			}
	}
?>