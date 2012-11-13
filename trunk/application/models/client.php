<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Client extends CI_Model 
	{
		function __construct()
			{
				parent::__construct();
			}
#############################################################################################################################
//CRUD for bank db

//SELECT
		function client()
			{
				return $this->db->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function client_id($id)
			{
				return $this->db->get_where('client', array('client_id' => $id));
			}

		function login($username, $password)
			{
				return $this->db->get_where('client', array('username' => $username, 'password' => $password ));
			}

		function clienta($a)
			{
				return $this->db->like('client', 'A', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array('group_id !=' => 1));
			}

		function clientb($a)
			{
				return $this->db->like('client', 'B', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientc($a)
			{
				return $this->db->like('client', 'C', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientd($a)
			{
				return $this->db->like('client', 'D', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function cliente($a)
			{
				return $this->db->like('client', 'E', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientf($a)
			{
				return $this->db->like('client', 'F', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientg($a)
			{
				return $this->db->like('client', 'G', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clienth($a)
			{
				return $this->db->like('client', 'H', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clienti($a)
			{
				return $this->db->like('client', 'I', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientj($a)
			{
				return $this->db->like('client', 'J', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientk($a)
			{
				return $this->db->like('client', 'K', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientl($a)
			{
				return $this->db->like('client', 'L', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientm($a)
			{
				return $this->db->like('client', 'M', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientn($a)
			{
				return $this->db->like('client', 'N', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function cliento($a)
			{
				return $this->db->like('client', 'O', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientp($a)
			{
				return $this->db->like('client', 'P', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientq($a)
			{
				return $this->db->like('client', 'Q', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientr($a)
			{
				return $this->db->like('client', 'R', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clients($a)
			{
				return $this->db->like('client', 'S', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientt($a)
			{
				return $this->db->like('client', 'T', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientu($a)
			{
				return $this->db->like('client', 'U', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientv($a)
			{
				return $this->db->like('client', 'V', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientw($a)
			{
				return $this->db->like('client', 'W', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientx($a)
			{
				return $this->db->like('client', 'X', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clienty($a)
			{
				return $this->db->like('client', 'Y', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

		function clientz($a)
			{
				return $this->db->like('client', 'Z', 'after')->like('client', $a, 'both')->order_by('client', 'ASC')->get_where('client', array ('group_id !=' => 1));
			}

//UPDATE
		function update_client($id, $name, $address_client, $phone_client, $email_client, $facebook_id_client, $twitter_id_client)
			{
				$this->db->where(array('client_id' => $id))->update('client', array('client' => $name, 'address_client' => $address_client, 'phone_client' => $phone_client, 'email_client' => $email_client, 'facebook_id_client' => $facebook_id_client, 'twitter_id_client' => $twitter_id_client));
			}

//INSERT
		function insert_client($name, $address_client, $phone_client, $email_client, $facebook_id_client, $twitter_id_client)
			{
				return $this->db->insert('client', array('client' => $name, 'username' => generatePassword(6, 1), 'password' => generatePassword(6, 1), 'address_client' => $address_client, 'phone_client' => $phone_client, 'email_client' => $email_client, 'facebook_id_client' => $facebook_id_client, 'twitter_id_client' => $twitter_id_client, 'group_id' => '2'));
			}

//DELETE
		function delete_client($id)
			{
				return $this->db->delete('client', array('client_id' => $id));
			}
	}
?>