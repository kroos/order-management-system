<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bank extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function bank()
			{
				return $this->db->order_by('bank_id')->get('bank');
			}

//UPDATE


//INSERT
		function insert_bank($bank)
			{
				return $this->db->insert('bank', $bank);
			}

//DELETE
		function delete_bank($id)
			{
				return $this->db->delete('bank', array('bank_id' => $id));
			}
	}
?>