<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Size extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function size()
			{
				return $this->db->order_by('size_id')->get('size');
			}

//UPDATE


//INSERT
		function insert_size($size)
			{
				return $this->db->set('size', $size)->insert('size');
			}

//DELETE
		function delete_size_id($size_id)
			{
				return $this->db->delete('size', array('size_id' => $size_id));
			}
	}
?>