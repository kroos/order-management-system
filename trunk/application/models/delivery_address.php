<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Delivery_address extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function delivery_address()
			{
				return $this->db->order_by('delivery_address_id')->get('delivery_address');
			}

		function delivery_address_id($infoid)
			{
				return $this->db->get_where('delivery_address', array('order_my_id' => $infoid));
			}

//UPDATE


//INSERT
		function insert_delivery_address($order_my_id, $name_delivery, $address_delivery, $phone_delivery, $email_delivery)
			{
				return $this->db->insert('delivery_address', array('order_my_id' => $order_my_id, 'name_delivery' => $name_delivery, 'address_delivery' => $address_delivery, 'phone_delivery' => $phone_delivery, 'email_delivery' => $email_delivery));
			}

//DELETE
		function delete_delivery_address_id($delivery_address_id)
			{
				return $this->db->delete('delivery_address', array('delivery_address_id' => $delivery_address_id));
			}

		function delete_delivery_address_order_my_id($order_my_id)
			{
				return $this->db->delete('delivery_address', array('order_my_id' => $order_my_id));
			}
	}
?>