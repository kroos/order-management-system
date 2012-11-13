<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_my extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function order_my($order_id)
			{
				return $this->db->get_where('order_my', array('order_my_id' => $order_id));
			}

		function getClientnDate($id, $fdate, $tdate)
			{
				return $this->db->query('SELECT * FROM `order_my` WHERE order_my.client_id = '.$id.' AND order_my.date_order BETWEEN "'.$fdate.'" AND "'.$tdate.'" ORDER BY order_my.date_order DESC');
			}

		function getClientnDatenStatus($id, $fdate, $tdate, $stat)
			{
				return $this->db->query('SELECT * FROM `order_my` WHERE order_my.client_id = '.$id.' AND order_my.date_order BETWEEN "'.$fdate.'" AND "'.$tdate.'"  AND order_my.order_status = '.$stat.' ORDER BY order_my.date_order DESC');
			}

//UPDATE
	function update_status($order_my_id, $update)
		{
			return $this->db->where('order_my_id', $order_my_id)->update('order_my', array('order_status' => $update));;
		}

//INSERT
		function insert_order_my($date, $method, $client_id, $type, $order_status)
			{
				return $this->db->insert('order_my', array ('date_order' => $date, 'method_order_id' => $method, 'client_id' => $client_id, 'order_type_id' => $type, 'order_status' => $order_status));
			}

//DELETE
		function delete_order_my_id($order_my_id)
			{
				return $this->db->delete('order_my', array('order_my_id' => $order_my_id));
			}
	}
?>