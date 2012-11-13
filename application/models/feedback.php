<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function feedback_order_my_id($order_my_id)
			{
				return $this->db->get_where('feedback', array('order_my_id' => $order_my_id));
			}

//UPDATE


//INSERT
		function insert_feedback($order_my_id, $comments)
			{
				return $this->db->set('comments', $comments)->set('order_my_id', $order_my_id)->insert('feedback');
			}

//DELETE
		function delete_feedback_order_my_id($order_my_id)
			{
				return $this->db->delete('feedback', array('order_my_id' => $order_my_id));
			}

		function delete_feedback_id($feedback_id)
			{
				return $this->db->delete('feedback', array('feedback_id' => $feedback_id));
			}
	}
?>