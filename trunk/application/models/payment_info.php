<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment_info extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for payment_info db

//SELECT
		function payment_info()
			{
				return $this->db->get('payment_info');
			}

		function check_payment($order_id)
			{
				return $this->db->get_where('payment_info', array('order_my_id' => $order_id));
			}

//UPDATE


//INSERT
		function insert_payment_info($order_my_id, $date, $bank, $total_payment, $mode_payment, $ref_no)
			{
				return $this->db->insert('payment_info', array('order_my_id' => $order_my_id, 'date_payment' => $date, 'bank_id' => $bank, 'total_payment' => $total_payment, 'mode_payment_id' => $mode_payment, 'ref_no' => $ref_no));
			}

//DELETE
		function delete_payment_info_id($payment_item_id)
			{
				return $this->db->delete('payment_info', array('payment_info_id' => $payment_item_id));
			}

		function delete_payment_info_order_my_id($order_my_id)
			{
				return $this->db->delete('payment_info', array('order_my_id' => $order_my_id));
			}
	}
?>