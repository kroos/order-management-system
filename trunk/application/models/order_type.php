<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_type extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function order_type()
			{
				return $this->db->get('order_type');
			}

//UPDATE


//INSERT
		function insert_type($order_type)
			{
				return $this->db->insert('order_type', array('type' => $order_type));
			}

//DELETE
		function delete_order_type_id($order_type_id)
			{
				return $this->db->delete('order_type', array('order_type_id' => $order_type_id));
			}
	}
?>