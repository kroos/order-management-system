<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Color extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function color()
			{
				return $this->db->order_by('color')->get('color');
			}

		function color_id($id)
			{
				return $this->db->get_where('color', array('color_id' => $id));
			}

//UPDATE


//INSERT
		function insert_color($color)
			{
				return $this->db->insert('color', array('color' => $color));
			}

//DELETE
		function delete_color_id($id)
			{
				return $this->db->delete('color', array('color_id' => $id));
			}
	}
?>