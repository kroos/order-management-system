<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery_type extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function delivery_type()
			{
				return $this->db->get('delivery_type');
			}

//UPDATE


//INSERT
		function insert_delivery_type($delivery_type)
			{
				return $this->db->insert('delivery_type', array('delivery_type' => $delivery_type));
			}

//DELETE
		function delete_delivery_type_id($delivery_type_id)
			{
				return $this->db->delete('delivery_type', array('delivery_type_id' => $delivery_type_id));
			}
	}
?>