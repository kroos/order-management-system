<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Method_order extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function method_order()
			{
				return $this->db->get('method_order');
			}

//UPDATE


//INSERT
		function insert_method_order($method_order)
			{
				return $this->db->insert('method_order', array('method_order' => $method_order));
			}

//DELETE
		function delete_method_order_id($method_order_id)
			{
				return $this->db->delete('method_order', array('method_order_id' => $method_order_id));
			}
	}
?>