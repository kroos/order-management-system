<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mode_payment extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function mode_payment()
			{
				return $this->db->get('mode_payment');
			}

//UPDATE


//INSERT
		function insert_mode_payment($mode_payment)
			{
				return $this->db->insert('mode_payment', array('mode_payment' => $mode_payment));
			}

//DELETE
		function delete_mode_payment_id($mode_payment_id)
			{
				return $this->db->delete('mode_payment', array('mode_payment_id' => $mode_payment_id));
			}
	}
?>