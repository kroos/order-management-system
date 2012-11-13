<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_item extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for order_item db

//SELECT
		function check_item($order_id)
			{
				return $this->db->get_where('order_item', array('order_my_id' => $order_id));
			}

//UPDATE


//INSERT
		function insert_order_item($order_my_id, $item, $size, $color, $quantity, $discount, $total_price)
			{
				return $this->db->insert('order_item', array('order_my_id' => $order_my_id, 'item_id' => $item, 'size_id' => $size, 'color_id' => $color, 'quantity' => $quantity, 'discount' => $discount, 'total_price' => $total_price));
			}

//DELETE
		function delete_id($order_item_id)
			{
				return $this->db->delete('order_item', array('id' => $order_item_id));
			}

		function delete_order_my_id($order_my_id)
			{
				return $this->db->delete('order_item', array('order_my_id' => $order_my_id));
			}
	}
?>