<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exchange extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT

//UPDATE

//INSERT
		function insert_exchange($id, $exchange_approve, $return_tracking_no, $date_exchange, $size_id, $remarks)
			{
				return $this->db->insert('exchange', array('id' => $id, 'exchange_approve' => $exchange_approve, 'return_tracking_no' => $return_tracking_no, 'date_exchange' => $date_exchange, 'size_id' => $size_id, 'remarks' => $remarks));
			}

//DELETE
		function delete_exchange_id($exchange_id)
			{
				return $this->db->delete('exchange', array('exchange_id' => $exchange_id));
			}
	}
?>