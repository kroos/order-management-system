<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery_info extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for delivery_info db

//SELECT
		function check_delivery($order_id)
			{
				return $this->db->get_where('delivery_info', array('order_my_id' => $order_id));
			}

//UPDATE


//INSERT
		function insert_delivery_info($order_my_id, $delivery_type, $delivery_date, $tracking_no, $delivered_by)
			{
				return $this->db->insert('delivery_info', array('order_my_id' => $order_my_id, 'delivery_type_id' => $delivery_type, 'delivery_date' => $delivery_date, 'tracking_no' => $tracking_no, 'delivered_by' => $delivered_by));
			}

//DELETE
		function delete_delivery_info_id($delivery_info_id)
			{
				return $this->db->delete('delivery_info', array('delivery_info_id' => $delivery_info_id));
			}

		function delete_delivery_info_order_my_id($order_my_id)
			{
				return $this->db->delete('delivery_info', array('order_my_id' => $order_my_id));
			}
	}
?>