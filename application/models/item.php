<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Item extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function item()
			{
				return $this->db->get('item');
			}

		function item_id($id)
			{
				return $this->db->get_where('item', array('item_id' => $id));
			}

//UPDATE


//INSERT
		function insert_item($item, $price)
			{
				return $this->db->insert('item', array('item' => $item, 'price' => $price));
			}

//DELETE
		function delete_item_id($item_id)
			{
				return $this->db->delete('item', array('item_id' => $item_id));
			}
	}
?>