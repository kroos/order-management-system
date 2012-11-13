<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

##################################################################################################

//form validation through controller
$config = array
				(
					'coms/index' => array
					(
						array
							(
								'field' => 'username',
								'label' => 'Username',
								'rules' => 'trim|required|min_length[5]|max_length[10]|xss_clean'
							),
						array
							(
								'field' => 'password',
								'label' => 'Password',
								'rules' => 'trim|required|min_length[5]|max_length[10]|xss_clean'
							)
					),
					'coms/orderdetail' => array
					(
						array
							(
								'field' => 'method',
								'label' => 'Method Order',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'type',
								'label' => 'Order Type',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'date',
								'label' => 'Date',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'order_status',
								'label' => 'Order Status',
								'rules' => 'trim|required|xss_clean'
							)
					),
					'coms/item' => array
					(
						array
							(
								'field' => 'order_my_id',
								'label' => 'Order Code',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'item',
								'label' => 'Item',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'size',
								'label' => 'Size',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'color',
								'label' => 'Color',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'quantity',
								'label' => 'Quantity',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'discount',
								'label' => 'Discount',
								'rules' => 'trim|required|numeric|xss_clean'
							)
					),
					'coms/payment' => array
					(
						array
							(
								'field' => 'order_my_id',
								'label' => 'Order Code',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'bank',
								'label' => 'Bank',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'total_payment',
								'label' => 'Total Payment',
								'rules' => 'trim|required|numeric|xss_clean'
							),
						array
							(
								'field' => 'mode_payment',
								'label' => 'Mode Payment',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'date',
								'label' => 'Date',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'ref_no',
								'label' => 'Reference No',
								'rules' => 'trim|required|alpha_dash|xss_clean'
							)
					),
					'coms/delivery' => array
					(
						array
							(
								'field' => 'order_my_id',
								'label' => 'Order Code',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'delivery_type',
								'label' => 'Delivery Type',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'delivery_date',
								'label' => 'Delivery Date',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'tracking_no',
								'label' => 'Tracking No',
								'rules' => 'trim|alpha_dash|xss_clean'
							),
						array
							(
								'field' => 'delivered_by',
								'label' => 'Delivery By',
								'rules' => 'trim|required|xss_clean'
							)
					),
					'coms/delivery_add' => array
					(
						array
							(
								'field' => 'delivery_info_id',
								'label' => 'delivery_info_id',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'name_delivery',
								'label' => 'Name',
								'rules' => 'trim|alpha_dash|is_unique[delivery_address.name_delivery]|xss_clean'
							),
						array
							(
								'field' => 'address_delivery',
								'label' => 'Additional Address',
								'rules' => 'trim|required|is_unique[delivery_address.address_delivery]|xss_clean'
							),
						array
							(
								'field' => 'phone_delivery',
								'label' => 'Phone',
								'rules' => 'trim|numeric|is_unique[delivery_address.phone_delivery]|xss_clean'
							),
						array
							(
								'field' => 'email_delivery',
								'label' => 'Email',
								'rules' => 'trim|valid_email|is_unique[delivery_address.email_delivery]|xss_clean'
							)
					),
					'coms/exchange' => array
					(
						array
							(
								'field' => 'id',
								'label' => 'Order Item ID',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'exchange_approve',
								'label' => 'Exchagne Status',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'return_tracking_no',
								'label' => 'Return Tracking No',
								'rules' => 'trim|alpha_dash|xss_clean'
							),
						array
							(
								'field' => 'date_exchange',
								'label' => 'Exchange Date',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'size_id',
								'label' => 'Size',
								'rules' => 'trim|numeric|xss_clean'
							),
						array
							(
								'field' => 'remarks',
								'label' => 'Remarks',
								'rules' => 'trim|xss_clean'
							)
					),
					'coms/client' => array
					(
						array
							(
								'field' => 'client',
								'label' => 'Client Name',
								'rules' => 'trim|required|is_unique[client.client]|xss_clean'
							),
						array
							(
								'field' => 'address_client',
								'label' => 'Client Address',
								'rules' => 'trim|required|is_unique[client.address_client]|xss_clean'
							),
						array
							(
								'field' => 'phone_client',
								'label' => 'Client Phone Number',
								'rules' => 'trim|is_natural|is_unique[client.phone_client]|required|xss_clean'
							),
						array
							(
								'field' => 'email_client',
								'label' => 'Client Email',
								'rules' => 'trim|is_unique[client.email_client]|valid_email|xss_clean'
							),
						array
							(
								'field' => 'facebook_id_client',
								'label' => 'Client Facebook',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'twitter_id_client',
								'label' => 'Client Twitter',
								'rules' => 'trim|xss_clean'
							)
					),
					'coms/newitem' => array
					(
						array
							(
								'field' => 'item',
								'label' => 'Item Name',
								'rules' => 'trim|required|is_unique[item.item]|xss_clean'
							),
						array
							(
								'field' => 'price',
								'label' => 'Item Price',
								'rules' => 'trim|required|max_length[8]|decimal|xss_clean'
							)
					),
					'coms/newsize' => array
					(
						array
							(
								'field' => 'size',
								'label' => 'Item Size',
								'rules' => 'trim|required|is_unique[size.size]|xss_clean'
							)
					),
					'coms/newcolor' => array
					(
						array
							(
								'field' => 'color',
								'label' => 'Item Color',
								'rules' => 'trim|required|is_unique[color.color]|xss_clean'
							)
					),
					'coms/newbank' => array
					(
						array
							(
								'field' => 'bank',
								'label' => 'Bank',
								'rules' => 'trim|required|is_unique[bank.bank]|xss_clean'
							)
					),
					'coms/neworder_method' => array
					(
						array
							(
								'field' => 'method_order',
								'label' => 'Order Method',
								'rules' => 'trim|required|is_unique[method_order.method_order]|xss_clean'
							)
					),
					'coms/newpayment_mode' => array
					(
						array
							(
								'field' => 'mode_payment',
								'label' => 'mode_payment',
								'rules' => 'trim|required|is_unique[mode_payment.mode_payment]|xss_clean'
							)
					),
					'coms/newdelivery_type' => array
					(
						array
							(
								'field' => 'delivery_type',
								'label' => 'Delivery Type',
								'rules' => 'trim|required|is_unique[delivery_type.delivery_type]|xss_clean'
							)
					),
					'coms/neworder_type' => array
					(
						array
							(
								'field' => 'type',
								'label' => 'Delivery Type',
								'rules' => 'trim|required|is_unique[order_type.type]|xss_clean'
							)
					),
					'coms/order' => array
					(
						array
							(
								'field' => 'search',
								'label' => 'Search',
								'rules' => 'trim|required|alpha|xss_clean'
							)
					),
					'coms/clientu' => array
					(
						array
							(
								'field' => 'client',
								'label' => 'Client Name',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'address_client',
								'label' => 'Client Address',
								'rules' => 'trim|required|max_length[500]|xss_clean'
							),
						array
							(
								'field' => 'phone_client',
								'label' => 'Client Phone Number',
								'rules' => 'trim|is_natural|required|xss_clean'
							),
						array
							(
								'field' => 'email_client',
								'label' => 'Client Email',
								'rules' => 'trim|required|valid_email|xss_clean'
							),
						array
							(
								'field' => 'facebook_id_client',
								'label' => 'Client Facebook',
								'rules' => 'trim|xss_clean'
							),
						array
							(
								'field' => 'twitter_id_client',
								'label' => 'Client Twitter',
								'rules' => 'trim|xss_clean'
							)
					),
					'coms/main' => array
					(
						array
							(
								'field' => 'from_date',
								'label' => 'Date From',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'untill_date',
								'label' => 'Date Untill',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'order_status',
								'label' => 'Order Status',
								'rules' => 'trim|is_natural|required|xss_clean'
							)
					),
					'coms/search_order' => array
					(
						array
							(
								'field' => 'client',
								'label' => 'Client Name',
								'rules' => 'trim|required|is_natural|xss_clean'
							),
						array
							(
								'field' => 'fdate',
								'label' => 'From Date',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'tdate',
								'label' => 'To Date',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'status_order',
								'label' => 'Order Status',
								'rules' => 'trim|required|is_natural|xss_clean'
							)
					),
					'coms/feedback' => array
					(
						array
							(
								'field' => 'order_my_id',
								'label' => 'Order Code',
								'rules' => 'trim|required|is_natural_no_zero|xss_clean'
							),
						array
							(
								'field' => 'feedback',
								'label' => 'Feedback',
								'rules' => 'trim|required|xss_clean'
							)
					),
					'report/index' => array
					(
						array
							(
								'field' => 'from_date',
								'label' => 'From Date',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'untill_date',
								'label' => 'Date To',
								'rules' => 'trim|required|xss_clean'
							)
					),
					'report/topitem' => array
					(
						array
							(
								'field' => 'from_date',
								'label' => 'From Date',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'untill_date',
								'label' => 'Date To',
								'rules' => 'trim|required|xss_clean'
							)
					),
					'report/topsize' => array
					(
						array
							(
								'field' => 'from_date',
								'label' => 'From Date',
								'rules' => 'trim|required|xss_clean'
							),
						array
							(
								'field' => 'untill_date',
								'label' => 'Date To',
								'rules' => 'trim|required|xss_clean'
							)
					)
				);
?>