<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coms extends CI_Controller
	{
		public function index()
			{
				$data['query'] = $this->view->order_list_view();
				if ($this->session->userdata('logged_in') == FALSE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('home');
							}
							else
							{
								//form processor
								if ($this->input->post('login', TRUE))
									{
										$user = $this->input->post('username', TRUE);
										$pass = $this->input->post('password', TRUE);
										$r = $this->client->login($user, $pass);
										if ($r->num_rows() == 1)
											{
												$session = array
																(
																	'username' => $user,
																	'password' => $pass,
																	'group' => $r->row()->group_id,
																	'logged_in' => TRUE,
																);
												$this->session->set_userdata($session);
												//$this->load->view('main', $data);
												redirect('/coms/main', 'location');
											}
											else
											{
												$data['info'] = 'Your username and password did\'nt match';
												$this->load->view('home', $data);
											}
									}
							}
					}
					else
					{
						//$this->load->view('main', $data);
						redirect('/coms/main', 'location');
					}
			}

		public function main()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->load->library('pagination');
						$config['base_url'] = base_url().'coms/main';
						//echo $this->view->order_list_view()->num_rows().'<br />';
						$config['total_rows'] = $this->view->order_list_view()->num_rows();
						$config['per_page'] = 5;

						$this->pagination->initialize($config);

						$data['query'] = $this->view->order_list_view_page($config['per_page'], $this->uri->segment(3, 0));
						$this->load->view('main', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function search_order()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$data['client'] = $this->client->client();
								$this->load->view('search_order', $data);
							}
							else
							{
								//form processor
								if($this->input->post('submit', TRUE))
									{
										$client = $this->input->post('client', TRUE);
										$fdate = $this->input->post('fdate', TRUE);
										$tdate = $this->input->post('tdate', TRUE);
										$status_order = $this->input->post('status_order', TRUE);

										if($fdate <= $tdate)
											{
												if($status_order == 10)
													{
														$g = $this->order_my->getClientnDate($client, $fdate, $tdate);
														if(!$g)
															{
																$data['client'] = $this->client->client();
																$data['query'] = $this->view->getClientnDate($client, $fdate, $tdate);
																$data['info'] = 'Please try again. Cant retrieve the record at the moment.';
																$this->load->view('search_order', $data);
															}
															else
															{
																$data['client'] = $this->client->client();
																$data['query'] = $this->view->getClientnDate($client, $fdate, $tdate);
																$data['info'] = '';
																$this->load->view('search_order', $data);
															}
													}
													else
													{
														$u = $this->view->getClientnDatenStatus($client, $fdate, $tdate, $status_order);
														if(!$u)
															{
																$data['client'] = $this->client->client();
																$data['query'] = $this->view->getClientnDatenStatus($client, $fdate, $tdate, $status_order);
																$data['info'] = 'Please try again. Cant retrieve the record at the moment.';
																$this->load->view('search_order', $data);
															}
															else
															{
																$data['client'] = $this->client->client();
																$data['query'] = $this->view->getClientnDatenStatus($client, $fdate, $tdate, $status_order);
																$data['info'] = '';
																$this->load->view('search_order', $data);
															}
													}
											}
											else
											{
												$data['client'] = $this->client->client();
												$data['query'] = $this->view->getClientnDate($client, $fdate, $tdate);
												$data['info'] = '\'From Date\' must be earlier than \'To Date\'';
												$this->load->view('search_order', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

/*		public function main()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('mainform');
							}
							else
							{
								//form processor
								if($this->input->post('test', TRUE))
									{
										$data['start'] = $this->input->post('from_date', TRUE);
										$data['end'] = $this->input->post('untill_date', TRUE);
										$status = $this->input->post('order_status', TRUE);

										//echo $from.' <br />'.$untill.' <br />'.$status.' <br />';

										if($status == 2)
											{
												$data['query'] = $this->view->order_list_view_nostatus($data['start'], $data['end']);
											}
											else
											{
												$data['query'] = $this->view->order_list_view_status($status, $data['start'], $data['end']);
											}
										$this->load->view('main', $data);
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}
*/

		public function order()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('searchorder');
							}
							else
							{
								//form processor
								if ($this->input->post('search_btn', TRUE))
									{
										$search = $this->input->post('search', TRUE);

										if ($search == 'all')
											{
												$data['clienta'] = $this->client->clienta('a');
												$data['clientb'] = $this->client->clientb('b');
												$data['clientc'] = $this->client->clientc('c');
												$data['clientd'] = $this->client->clientd('d');
												$data['cliente'] = $this->client->cliente('e');
												$data['clientf'] = $this->client->clientf('f');
												$data['clientg'] = $this->client->clientg('g');
												$data['clienth'] = $this->client->clienth('h');
												$data['clienti'] = $this->client->clienti('i');
												$data['clientj'] = $this->client->clientj('j');
												$data['clientk'] = $this->client->clientk('k');
												$data['clientl'] = $this->client->clientl('l');
												$data['clientm'] = $this->client->clientm('m');
												$data['clientn'] = $this->client->clientn('n');
												$data['cliento'] = $this->client->cliento('o');
												$data['clientp'] = $this->client->clientp('p');
												$data['clientq'] = $this->client->clientq('q');
												$data['clientr'] = $this->client->clientr('r');
												$data['clients'] = $this->client->clients('s');
												$data['clientt'] = $this->client->clientt('t');
												$data['clientu'] = $this->client->clientu('u');
												$data['clientv'] = $this->client->clientv('v');
												$data['clientw'] = $this->client->clientw('w');
												$data['clientx'] = $this->client->clientx('x');
												$data['clienty'] = $this->client->clienty('y');
												$data['clientz'] = $this->client->clientz('z');
												$this->load->view('searchorder', $data);
											}
											else
											{
												$data['clienta'] = $this->client->clienta($search);
												$data['clientb'] = $this->client->clientb($search);
												$data['clientc'] = $this->client->clientc($search);
												$data['clientd'] = $this->client->clientd($search);
												$data['cliente'] = $this->client->cliente($search);
												$data['clientf'] = $this->client->clientf($search);
												$data['clientg'] = $this->client->clientg($search);
												$data['clienth'] = $this->client->clienth($search);
												$data['clienti'] = $this->client->clienti($search);
												$data['clientj'] = $this->client->clientj($search);
												$data['clientk'] = $this->client->clientk($search);
												$data['clientl'] = $this->client->clientl($search);
												$data['clientm'] = $this->client->clientm($search);
												$data['clientn'] = $this->client->clientn($search);
												$data['cliento'] = $this->client->cliento($search);
												$data['clientp'] = $this->client->clientp($search);
												$data['clientq'] = $this->client->clientq($search);
												$data['clientr'] = $this->client->clientr($search);
												$data['clients'] = $this->client->clients($search);
												$data['clientt'] = $this->client->clientt($search);
												$data['clientu'] = $this->client->clientu($search);
												$data['clientv'] = $this->client->clientv($search);
												$data['clientw'] = $this->client->clientw($search);
												$data['clientx'] = $this->client->clientx($search);
												$data['clienty'] = $this->client->clienty($search);
												$data['clientz'] = $this->client->clientz($search);
												$this->load->view('searchorder', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function orderdetail()
			{
				$client_id = $this->uri->segment(3, 0);
				$data['client'] = $this->client->client_id($client_id);
				$data['method'] = $this->method_order->method_order();
				$data['type'] = $this->order_type->order_type();
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//nak kena detect only numeric sahaja.
						if (is_numeric($client_id))
							{
								//process
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										//echo $client_id;
										$this->load->view('orderdetail', $data);
									}
									else
									{
										//form processor
										if ($this->input->post('next', TRUE))
											{
												$method = $this->input->post('method', TRUE);
												$type = $this->input->post('type', TRUE);
												$date = $this->input->post('date', TRUE);
												$order_status = $this->input->post('order_status', TRUE);
												//echo $type.'<br />'.$date.'<br />'.$order_status.'<br />';
		
												$u = $this->order_my->insert_order_my($date, $method, $client_id, $type, $order_status);
												$y = $this->db->call_function('insert_id', $this->db->conn_id);

												if (!$u)
													{
														$data['info'] = 'Can\'t insert data into database, please try again later';
														$this->load->view('orderdetail', $data);
													}
													else
													{
														//yg asal
														//redirect('coms/details/'.$y, 'location');
														redirect('coms/detailsorder/'.$y, 'location');
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function details()
			{
				$order_id = $this->uri->segment(3, 0);
				$data['order_my'] = $this->order_my->order_my($order_id);
				$data['client'] = $this->client->client_id($data['order_my']->row()->client_id);
				$data['order_summary'] = $this->view->order_where_summary_view($order_id);
				$data['item_where_view'] = $this->view->item_where_view($order_id);
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//nak kena detect only numeric sahaja.
						if (is_numeric($order_id))
							{
								//order_my part
								$this->load->view('details', $data);
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function item()
			{
				$order_id = $this->uri->segment(3, 0);
				//order_my part
				$data['order_my'] = $this->order_my->order_my($order_id);
				$data['client'] = $this->client->client_id($data['order_my']->row()->client_id);

				//item part
				$data['item'] = $this->item->item();
				$data['size'] = $this->size->size();
				$data['color'] = $this->color->color();

				//item view part
				$data['item_list'] = $this->view->order_item_view($order_id);

				//details view part
				$data['order_summary'] = $this->view->order_where_summary_view($order_id);
				$data['item_where_view'] = $this->view->item_where_view($order_id);

				//nak kena detect only numeric sahaja.
				if (is_numeric($order_id))
					{
						if ($this->session->userdata('logged_in') == TRUE)
							{
								//process
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('item', $data);
									}
									else
									{
										//form processor
										$test = $this->input->post(NULL, TRUE);		// returns all POST items with XSS filter
										//print_r($test);
										if ($this->input->post('item_info', TRUE))
											{
												//kira dulu...
												$order_my_id = $this->input->post('order_my_id', TRUE);
												$item = $this->input->post('item', TRUE);
												$size = $this->input->post('size', TRUE);
												$color = $this->input->post('color', TRUE);
												$quantity = $this->input->post('quantity', TRUE);
												$discount = $this->input->post('discount', TRUE);
		
												//nak kena cari price dulu
												$price = $this->item->item_id($item)->row()->price;
												//echo $price.' price<br />';
		
												//start kira
												$total_price = ($price * $quantity) - $discount;
												//echo $total_price.' total price<br />';
		
												//time to insert data
												$t = $this->order_item->insert_order_item($order_my_id, $item, $size, $color, $quantity, $discount, $total_price);
												if (!$t)
													{
														$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
														$this->load->view('item', $data);
													}
													else
													{
														$data['item_list'] = $this->view->order_item_view($order_id);
														$data['info'] = 'Successful inserting data';
														$this->load->view('item', $data);
													}
											}
									}
							}
							else
							{
								redirect(base_url(), 'location');
							}
					}
					else
					{
						$data['info'] = 'What are you trying to do?';
						$this->load->view('home', $data);
					}
			}

		public function payment()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process

						$order_id = $this->uri->segment(3, 0);
						//order_my part
						$data['order_my'] = $this->order_my->order_my($order_id);
						$data['client'] = $this->client->client_id($data['order_my']->row()->client_id);

						//payment part
						$data['bank'] = $this->bank->bank();
						$data['mode_payment'] = $this->mode_payment->mode_payment();
						
						//payment view part
						$data['payment_list'] = $this->view->order_payment_view($order_id);

						//details view part
						$data['order_summary'] = $this->view->order_where_summary_view($order_id);
						$data['item_where_view'] = $this->view->item_where_view($order_id);
						//nak kena detect only numeric sahaja.
						if (is_numeric($order_id))
							{
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('payment', $data);
									}
									else
									{
										//form processor
										if ($this->input->post('payment_info', TRUE))
											{
												$order_my_id = $this->input->post('order_my_id', TRUE);
												$bank = $this->input->post('bank', TRUE);
												$total_payment = $this->input->post('total_payment', TRUE);
												$mode_payment = $this->input->post('mode_payment', TRUE);
												$date = $this->input->post('date', TRUE);
												$ref_no = strtoupper($this->input->post('ref_no', TRUE));

												$y = $this->payment_info->insert_payment_info($order_my_id, $date, $bank, $total_payment, $mode_payment, $ref_no);

												if (!$y)
													{
														$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
														$this->load->view('payment', $data);
													}
													else
													{
														$data['payment_list'] = $this->view->order_payment_view($order_id);
														$data['info'] = 'Successful inserting data';
														$this->load->view('payment', $data);
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function delivery()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$order_id = $this->uri->segment(3, 0);

						//order_my part
						$data['order_my'] = $this->order_my->order_my($order_id);
						$data['client'] = $this->client->client_id($data['order_my']->row()->client_id);

						//delivery part
						$data['delivery_type'] = $this->delivery_type->delivery_type();

						//delivery view part
						$data['delivery_list'] = $this->view->order_delivery_view($order_id);

						//details view part
						$data['order_summary'] = $this->view->order_where_summary_view($order_id);
						$data['item_where_view'] = $this->view->item_where_view($order_id);

						//nak kena detect only numeric sahaja.
						if (is_numeric($order_id))
							{

								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('delivery', $data);
									}
									else
									{
										//form processor
										$o = $this->input->post(NULL, TRUE);
										//print_r($o);
										if ($this->input->post('delivery_info', TRUE))
											{
												$order_my_id = $this->input->post('order_my_id', TRUE);
												$delivery_type = $this->input->post('delivery_type', TRUE);
												$delivery_date = $this->input->post('delivery_date', TRUE);
												$tracking_no = $this->input->post('tracking_no', TRUE);
												$delivered_by = strtoupper($this->input->post('delivered_by', TRUE));

												$n = $this->delivery_info->insert_delivery_info($order_my_id, $delivery_type, $delivery_date, $tracking_no, $delivered_by);
												
												if (!$n)
													{
														$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
														$this->load->view('delivery', $data);
													}
													else
													{
														$data['delivery_list'] = $this->view->order_delivery_view($order_id);
														$data['info'] = 'Successful inserting data';
														$this->load->view('delivery', $data);
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function delivery_add()
			{
				$order_my_id = $this->uri->segment(3, 0);
				$delivery_info_id = $this->uri->segment(4, 0);
				//nak kena detect only numeric sahaja.
				if (is_numeric($order_my_id) && is_numeric($delivery_info_id))
					{
						//order_my part
						$data['order_my'] = $this->order_my->order_my($order_my_id);
						$data['client'] = $this->client->client_id($data['order_my']->row()->client_id);

						//delivery address view part
						$data['delivery_address_list'] = $this->delivery_address->delivery_address_id($order_my_id);

						//details view part
						$data['order_summary'] = $this->view->order_where_summary_view($order_my_id);
						$data['item_where_view'] = $this->view->item_where_view($order_my_id);

						if ($this->session->userdata('logged_in') == TRUE)
							{
								//process
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('delivery_add', $data);
									}
									else
									{
										//form processor
										if ($this->input->post('delivery_address', TRUE))
											{
												$delivery_info_id = $this->input->post('delivery_info_id', TRUE);
												$name_delivery = $this->input->post('name_delivery', TRUE);
												$address_delivery = ucwords(strtolower($this->input->post('address_delivery', TRUE)));
												$phone_delivery = $this->input->post('phone_delivery', TRUE);
												$email_delivery = $this->input->post('email_delivery', TRUE);
		
												$j = $this->delivery_address->insert_delivery_address($delivery_info_id, $name_delivery, $address_delivery, $phone_delivery, $email_delivery);
		
												if (!$j)
													{
														$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
														$this->load->view('delivery_add', $data);
													}
													else
													{
														$data['delivery_address_list'] = $this->delivery_address->delivery_address_id($order_my_id);
														$data['info'] = 'Successful inserting data';
														$this->load->view('delivery_add', $data);
													}
											}
									}
							}
							else
							{
								redirect(base_url(), 'location');
							}
					}
					else
					{
						$data['info'] = 'What are you trying to do?';
						$this->load->view('home', $data);
					}

			}

		public function exchange()
			{
				$order_id = $this->uri->segment(3, 0);
				$order_item_id = $this->uri->segment(4, 0);
				//nak kena detect only numeric sahaja.
				if (is_numeric($order_id) && is_numeric($order_item_id))
					{
						//order_my part
						$data['order_my'] = $this->order_my->order_my($order_id);
						$data['client'] = $this->client->client_id($data['order_my']->row()->client_id);

						//size part
						$data['size'] = $this->size->size();

						//exchange view part
						$data['exchange_view'] = $this->view->exchange_view($order_item_id);

						//details view part
						$data['order_summary'] = $this->view->order_where_summary_view($order_id);
						$data['item_where_view'] = $this->view->item_where_view($order_id);

						if ($this->session->userdata('logged_in') == TRUE)
							{
								//process
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('exchange', $data);
									}
									else
									{
										//form processor
										if ($this->input->post('exchange_info', TRUE))
											{
												$id = $this->input->post('id', TRUE);
												$exchange_approve = $this->input->post('exchange_approve');
												$return_tracking_no = $this->input->post('return_tracking_no', TRUE);
												$date_exchange = $this->input->post('date_exchange', TRUE);
												$size_id = $this->input->post('size_id', TRUE);
												$remarks = ucwords(strtolower($this->input->post('remarks', TRUE)));

												$p = $this->exchange->insert_exchange($id, $exchange_approve, $return_tracking_no, $date_exchange, $size_id, $remarks);

												if($p)
													{
														$data['exchange_view'] = $this->view->exchange_view($order_item_id);
														$data['info'] = 'Successful inserting data';
														$this->load->view('exchange', $data);
													}
											}
									}
							}
							else
							{
								redirect(base_url(), 'location');
							}
					}
					else
					{
						$data['info'] = 'What are you trying to do?';
						$this->load->view('home', $data);
					}
			}

		public function feedback()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$order_id = $this->uri->segment(3, 0);

						//order_my part
						$data['order_my'] = $this->db->get_where('order_my', array('order_my_id' => $order_id));
						$data['client'] = $this->client->client_id($data['order_my']->row()->client_id);

						//feedback part
						$data['feedback'] = $this->feedback->feedback_order_my_id($order_id);
						
						//details view part
						$data['order_summary'] = $this->view->order_where_summary_view($order_id);
						$data['item_where_view'] = $this->view->item_where_view($order_id);
						//nak kena detect only numeric sahaja.
						if (is_numeric($order_id))
							{

								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
		
										$this->load->view('feedback', $data);
									}
									else
									{
										//form processor
										$order_my_id = $this->input->post('order_my_id', TRUE);
										$feedback = ucwords(strtolower($this->input->post('feedback', TRUE)));

										$s = $this->feedback->insert_feedback($order_my_id, $feedback);
										
										if (!$s)
											{
												$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
												$this->load->view('feedback', $data);
											}
											else
											{
												$data['feedback'] = $this->feedback->feedback_order_my_id($order_id);
												$data['info'] = 'Successful inserting data';
												$this->load->view('feedback', $data);
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}

					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function orderu()
			{
				//$this->output->enable_profiler(TRUE);
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$order_my_id = $this->uri->segment(3, 0);
						$update = $this->uri->segment(4, 0);
						$data['query'] = $this->view->order_list_view();
						//nak kena detect only numeric sahaja.
						if (is_numeric($order_my_id) && is_numeric($update))
							{
								//checking orderitem kalau ada item, kalau xdak maka x boleh close
								$j = $this->order_item->check_item($order_my_id);
								$p = $this->payment_info->check_payment($order_my_id);
								$l = $this->delivery_info->check_delivery($order_my_id);
								if ($j->num_rows() < 1 )
									{
										$data['info'] = ' Sorry, cant close the order. You havent fill up item section. This order doesnt have any item info';
										//redirect(base_url(), 'location');
										$this->load->view('main', $data);
									}
									else
									{
										if ($p->num_rows() < 1 )
											{
												$data['info'] = ' Sorry, cant close the order. You havent fill up payment section. This order doesnt have any payment info';
												//redirect(base_url(), 'location');
												$this->load->view('main', $data);
											}
											else
											{
												if ($l->num_rows() < 1 )
													{
														$data['info'] = ' Sorry, cant close the order. You havent fill up delivery section. This order doesnt have any delivery info';
														//redirect(base_url(), 'location');
														$this->load->view('main', $data);
													}
													else
													{
														//order_my part
														$d = $this->order_my->update_status($order_my_id, $update);

														if (!$d)
															{
																$data['info'] = 'Sorry, cant close the order. Please try again later';
																$this->load->view('main', $data);
															}
															else
															{
																redirect('', 'location');
															}
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function itemr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$order_item_id = $this->uri->segment(4, 0);
						$order_my_id = $this->uri->segment(3, 0);
						//nak kena detect only numeric sahaja.
						if (is_numeric($order_my_id) && is_numeric($order_item_id))
							{
								//order_my part
								$d = $this->order_item->delete_id($order_item_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('home', $data);
									}
									else
									{
										//redirect('coms/item/'.$order_my_id, 'location');
										redirect('coms/detailsorder/'.$order_my_id, 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function paymentr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$payment_item_id = $this->uri->segment(4, 0);
						$order_my_id = $this->uri->segment(3, 0);
						//nak kena detect only numeric sahaja.
						if (is_numeric($order_my_id) && is_numeric($payment_item_id))
							{
								//order_my part
								$d = $this->payment_info->delete_payment_info_id($payment_item_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('home', $data);
									}
									else
									{
										//redirect('coms/payment/'.$order_my_id, 'location');
										redirect('coms/detailsorder/'.$order_my_id, 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function deliveryr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$delivery_info_id = $this->uri->segment(4, 0);
						$order_my_id = $this->uri->segment(3, 0);
						//nak kena detect only numeric sahaja.
						if (is_numeric($order_my_id) && is_numeric($delivery_info_id))
							{
								//order_my part
								$d = $this->delivery_info->delete_delivery_info_id($delivery_info_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('home', $data);
									}
									else
									{
										//redirect('coms/delivery/'.$order_my_id, 'location');
										redirect('coms/detailsorder/'.$order_my_id, 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function delivery_addr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$delivery_address_id = $this->uri->segment(4, 0);
						$order_my_id = $this->uri->segment(3, 0);
						//nak kena detect only numeric sahaja.
						if (is_numeric($order_my_id) && is_numeric($delivery_address_id))
							{
								//order_my part
								$d = $this->delivery_address->delete_delivery_address_id($delivery_address_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('home', $data);
									}
									else
									{
										//redirect('coms/delivery_add/'.$order_my_id, 'location');
										redirect('coms/detailsorder/'.$order_my_id, 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function exchanger()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$order_my_id = $this->uri->segment(3, 0);
						$order_item_id = $this->uri->segment(4, 0);
						$exchange_id = $this->uri->segment(5, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($order_my_id) && is_numeric($order_item_id) && is_numeric($exchange_id))
							{
								//order_my part
								$d = $this->exchange->delete_exchange_id($exchange_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('home', $data);
									}
									else
									{
										//redirect('coms/exchange/'.$order_my_id.'/'.$order_item_id, 'location');
										//redirect('coms/detailsorder/'.$order_my_id.'/'.$order_item_id, 'location');
										redirect('coms/item/'.$order_my_id, 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function client()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('client');
							}
							else
							{
								//form processor
								if ($this->input->post('new_client', TRUE))
									{
										$client = ucwords(strtolower($this->input->post('client', TRUE)));
										$address_client =  ucwords(strtolower($this->input->post('address_client', TRUE)));
										$phone_client = $this->input->post('phone_client', TRUE);
										$email_client = $this->input->post('email_client', TRUE);
										$facebook_id_client = $this->input->post('facebook_id_client', TRUE);
										$twitter_id_client = $this->input->post('twitter_id_client', TRUE);
										
										$g = $this->client->insert_client($client, $address_client, $phone_client, $email_client, $facebook_id_client, $twitter_id_client);
										$d = $this->db->call_function('insert_id', $this->db->conn_id);
										if (!$g)
											{
												$data['info'] = 'Failed to insert data. Please try again later';
												$this->load->view('client', $data);
											}
											else
											{
												redirect('coms/orderdetail/'.$d, 'location');
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newitem()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['query'] = $this->item->item();

						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('newitem', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('new_item', TRUE))
									{
										$item =  ucwords($this->input->post('item', TRUE));
										$price = $this->input->post('price', TRUE);

										$h = $this->item->insert_item($item, $price);

										if (!$h)
											{
												$data['info'] = 'Please try again later';
												$this->load->view('newitem', $data);
											}
											else
											{
												$data['info'] = 'Successful insert data';
												$this->load->view('newitem', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newitemr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$item_id = $this->uri->segment(3, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($item_id))
							{
								//order_my part
								$d = $this->item->delete_item_id($item_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('newitem', $data);
									}
									else
									{
										redirect('coms/newitem', 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newsize()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['query'] = $this->size->size();
						
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('newsize', $data);
							}
							else
							{
								//form processor
								//print_r($this->input->post(NULL, TRUE));
								if ($this->input->post('new_size', TRUE))
									{
										$size = $this->input->post('size', TRUE);

										$h = $this->size->insert_size($size);

										if (!$h)
											{
												$data['info'] = 'Please try again later';
												$this->load->view('newsize', $data);
											}
											else
											{
												$data['info'] = 'Successful insert data';
												$this->load->view('newsize', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newsizer()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$size_id = $this->uri->segment(3, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($size_id))
							{
								//order_my part
								$d = $this->size->delete_size_id($size_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('newsize', $data);
									}
									else
									{
										redirect('coms/newsize', 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newcolor()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['query'] = $this->color->color();

						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('newcolor', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('new_color', TRUE))
									{
										$color =  ucwords($this->input->post('color', TRUE));

										$h = $this->color->insert_color($color);

										if (!$h)
											{
												$data['info'] = 'Please try again later';
												$this->load->view('newcolor', $data);
											}
											else
											{
												$data['info'] = 'Successful insert data';
												$this->load->view('newcolor', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newcolorr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$color_id = $this->uri->segment(3, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($color_id))
							{
								//order_my part
								$d = $this->color->delete_color_id($color_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('newcolor', $data);
									}
									else
									{
										redirect('coms/newcolor', 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newbank()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['query'] = $this->bank->bank();

						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('newbank', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('new_bank', TRUE))
									{
										$bank =  ucwords($this->input->post('bank', TRUE));

										$h = $this->bank->insert_bank($bank);

										if (!$h)
											{
												$data['info'] = 'Please try again later';
												$this->load->view('newbank', $data);
											}
											else
											{
												$data['info'] = 'Successful insert data';
												$this->load->view('newbank', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newbankr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$bank_id = $this->uri->segment(3, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($bank_id))
							{
								$d = $this->bank->delete_bank($bank_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('newbank', $data);
									}
									else
									{
										redirect('coms/newbank', 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function neworder_method()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['query'] = $this->method_order->method_order();

						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('newmethod_order', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('new_method_order', TRUE))
									{
										$method_order =  ucwords($this->input->post('method_order', TRUE));

										$h = $this->method_order->insert_method_order($method_order);

										if (!$h)
											{
												$data['info'] = 'Please try again later';
												$this->load->view('newmethod_order', $data);
											}
											else
											{
												$data['info'] = 'Successful insert data';
												$this->load->view('newmethod_order', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newmethod_orderr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$method_order_id = $this->uri->segment(3, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($method_order_id))
							{
								//order_my part
								$d = $this->method_order->delete_method_order_id($method_order_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('newmethod_order', $data);
									}
									else
									{
										redirect('coms/neworder_method', 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newpayment_mode()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['query'] = $this->mode_payment->mode_payment();
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('newmode_payment', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('new_mode_payment', TRUE))
									{
										$mode_payment =  ucwords($this->input->post('mode_payment', TRUE));

										$h = $this->mode_payment->insert_mode_payment($mode_payment);

										if (!$h)
											{
												$data['info'] = 'Please try again later';
												$this->load->view('newmode_payment', $data);
											}
											else
											{
												$data['info'] = 'Successful insert data';
												$this->load->view('newmode_payment', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newmode_paymentr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$mode_payment_id = $this->uri->segment(3, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($mode_payment_id))
							{
								//order_my part
								$d = $this->mode_payment->delete_mode_payment_id($mode_payment_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('newmode_payment', $data);
									}
									else
									{
										redirect('coms/newpayment_mode', 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newdelivery_type()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['query'] = $this->delivery_type->delivery_type();

						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('newdelivery_type', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('new_delivery_type', TRUE))
									{
										$delivery_type =  ucwords($this->input->post('delivery_type', TRUE));

										$h = $this->delivery_type->insert_delivery_type($delivery_type);

										if (!$h)
											{
												$data['info'] = 'Please try again later';
												$this->load->view('newdelivery_type', $data);
											}
											else
											{
												$data['info'] = 'Successful insert data';
												$this->load->view('newdelivery_type', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function newdelivery_typer()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$delivery_type_id = $this->uri->segment(3, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($delivery_type_id))
							{
								//order_my part
								$d = $this->delivery_type->delete_delivery_type_id($delivery_type_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('newdelivery_type', $data);
									}
									else
									{
										redirect('coms/newdelivery_type', 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function neworder_type()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$data['query'] = $this->order_type->order_type();

						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('neworder_type', $data);
							}
							else
							{
								//form processor
								if ($this->input->post('new_type', TRUE))
									{
										$order_type =  ucwords($this->input->post('type', TRUE));

										$h = $this->order_type->insert_type($order_type);

										if (!$h)
											{
												$data['info'] = 'Please try again later';
												$this->load->view('neworder_type', $data);
											}
											else
											{
												$data['info'] = 'Successful insert data';
												$this->load->view('neworder_type', $data);
											}
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function neworder_typer()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$order_type_id = $this->uri->segment(3, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($order_type_id))
							{
								//order_my part
								$d = $this->order_type->delete_order_type_id($order_type_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('neworder_type', $data);
									}
									else
									{
										redirect('coms/neworder_type', 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function clientr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$client_id = $this->uri->segment(3, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($client_id))
							{
								//order_my part
								$d = $this->client->delete_client($client_id);

								if (!$d)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('home', $data);
									}
									else
									{
										redirect('coms/order', 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function detailsorder()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$order_id = $this->uri->segment(3, 0);
						$data['order_my'] = $this->db->get_where('order_my', array('order_my_id' => $order_id));
						$data['client'] = $this->client->client_id($data['order_my']->row()->client_id);

						//item part
						$data['item'] = $this->item->item();
						$data['size'] = $this->size->size();
						$data['color'] = $this->color->color();

						//item view part
						$data['item_list'] = $this->view->order_item_view($order_id);

						//payment part
						$data['bank'] = $this->bank->bank();
						$data['mode_payment'] = $this->mode_payment->mode_payment();

						//payment view part
						$data['payment_list'] = $this->view->order_payment_view($order_id);

						//delivery part
						$data['delivery_type'] = $this->delivery_type->delivery_type();

						//delivery view part
						$data['delivery_list'] = $this->view->delivery_info_view($order_id);

						//additional delivery address part
						$data['delivery_address'] = $this->delivery_address->delivery_address_id($order_id);

						//feedback part
						$data['feedback'] = $this->feedback->feedback_order_my_id($order_id);

						if (is_numeric($order_id))
							{
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								//validation process
								if ($this->input->post('item_info', TRUE))
									{
										$this->form_validation->set_rules('order_my_id', 'Order Code', 'trim|required|is_natural_no_zero|xss_clean');
										$this->form_validation->set_rules('item', 'Item', 'trim|required|is_natural_no_zero|xss_clean');
										$this->form_validation->set_rules('size', 'Size', 'trim|required|is_natural_no_zero|xss_clean');
										$this->form_validation->set_rules('color', 'Color', 'trim|required|is_natural_no_zero|xss_clean');
										$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|is_natural_no_zero|xss_clean');
										$this->form_validation->set_rules('discount', 'Discount', 'trim|required|numeric|xss_clean');
									}
									else
									{
										if ($this->input->post('payment_info', TRUE))
											{
												$this->form_validation->set_rules('order_my_id', 'Order Code', 'trim|required|is_natural_no_zero|xss_clean');
												$this->form_validation->set_rules('bank', 'Bank', 'trim|required|is_natural_no_zero|xss_clean');
												$this->form_validation->set_rules('total_payment', 'Total Payment', 'trim|required|numeric|xss_clean');
												$this->form_validation->set_rules('mode_payment', 'Mode Payment', 'trim|required|is_natural_no_zero|xss_clean');
												$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
												$this->form_validation->set_rules('ref_no', 'Reference No', 'trim|required|alpha_dash|xss_clean');
											}
											else
											{
												if ($this->input->post('delivery_info', TRUE))
													{
														$this->form_validation->set_rules('order_my_id', 'Order Code', 'trim|required|is_natural_no_zero|xss_clean');
														$this->form_validation->set_rules('delivery_type', 'Delivery Type', 'trim|required|is_natural_no_zero|xss_clean');
														$this->form_validation->set_rules('delivery_date', 'Delivery Date', 'trim|required|xss_clean');
														$this->form_validation->set_rules('tracking_no', 'Tracking No', 'trim|alpha_dash|xss_clean');
														$this->form_validation->set_rules('delivered_by', 'Delivery By', 'trim|required|xss_clean');
														$this->form_validation->set_rules('add_address', 'Additional Address', 'trim|alpha_dash|xss_clean');
													}
													else
													{
														if ($this->input->post('delivery_address', TRUE))
															{
																$this->form_validation->set_rules('order_my_id', 'Order Code', 'trim|required|is_natural_no_zero|xss_clean');
																$this->form_validation->set_rules('name', 'Person Name', 'trim|xss_clean');
																$this->form_validation->set_rules('phone', 'Person Phone', 'trim|numeric|xss_clean');
																$this->form_validation->set_rules('email', 'Person Email', 'trim|valid_email|xss_clean');
																$this->form_validation->set_rules('add_address', 'Additional Address', 'trim|required|xss_clean');
															}
															else
															{
																if ($this->input->post('feedback', TRUE))
																	{
																		$this->form_validation->set_rules('order_my_id', 'Order Code', 'trim|required|is_natural_no_zero|xss_clean');
																		$this->form_validation->set_rules('feed', 'Additional Address', 'trim|required|xss_clean');
																	}
																	else
																	{
																	
																	}
															}
													}
											}
									}

								//process
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('orderdetails', $data);
									}
									else
									{
										//form processor
										if ($this->input->post('item_info', TRUE))
											{
												//kira dulu...
												$order_my_id = $this->input->post('order_my_id', TRUE);
												$item = $this->input->post('item', TRUE);
												$size = $this->input->post('size', TRUE);
												$color = $this->input->post('color', TRUE);
												$quantity = $this->input->post('quantity', TRUE);
												$discount = $this->input->post('discount', TRUE);

												//nak kena cari price dulu
												$price = $this->item->item_id($item)->row()->price;
												//echo $price.' price<br />';

												//start kira
												$total_price = ($price * $quantity) - $discount;
												//echo $total_price.' total price<br />';

												//time to insert data
												$t = $this->order_item->insert_order_item($order_my_id, $item, $size, $color, $quantity, $discount, $total_price);
												if (!$t)
													{
														$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
														$this->load->view('orderdetails', $data);
													}
													else
													{
														$data['item_list'] = $this->view->order_item_view($order_id);
														$data['info'] = 'Successful inserting data';
														$this->load->view('orderdetails', $data);
													}
											}
											else
											{
												if ($this->input->post('payment_info', TRUE))
													{
														$order_my_id = $this->input->post('order_my_id', TRUE);
														$bank = $this->input->post('bank', TRUE);
														$total_payment = $this->input->post('total_payment', TRUE);
														$mode_payment = $this->input->post('mode_payment', TRUE);
														$date = $this->input->post('date', TRUE);
														$ref_no = strtoupper($this->input->post('ref_no', TRUE));

														$y = $this->db->insert('payment_info', array('order_my_id' => $order_my_id, 'date_payment' => $date, 'bank_id' => $bank, 'total_payment' => $total_payment, 'mode_payment_id' => $mode_payment, 'ref_no' => $ref_no));

														if (!$y)
															{
																$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
																$this->load->view('orderdetails', $data);
															}
															else
															{
																$data['payment_list'] = $this->view->order_payment_view($order_id);
																$data['info'] = 'Successful inserting data';
																$this->load->view('orderdetails', $data);
															}
													}
													else
													{
														if ($this->input->post('delivery_info', TRUE))
															{
																$order_my_id = $this->input->post('order_my_id', TRUE);
																$delivery_type = $this->input->post('delivery_type', TRUE);
																$delivery_date = $this->input->post('delivery_date', TRUE);
																$tracking_no = strtoupper($this->input->post('tracking_no', TRUE));
																$delivered_by = strtoupper($this->input->post('delivered_by', TRUE));

																$n = $this->delivery_info->insert_delivery_info($order_my_id, $delivery_type, $delivery_date, $tracking_no, $delivered_by);
																if (!$n)
																	{
																		$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
																		$this->load->view('orderdetails', $data);
																	}
																	else
																	{
																		$data['delivery_list'] = $this->view->delivery_info_view($order_id);
																		$data['info'] = 'Successful inserting data';
																		$this->load->view('orderdetails', $data);
																	}
															}
															else
															{
																if ($this->input->post('delivery_address', TRUE))
																	{
																		$order_my_id = $this->input->post('order_my_id', TRUE);
																		$name_delivery = ucwords(strtolower($this->input->post('name', TRUE)));
																		$address_delivery = ucwords(strtolower($this->input->post('add_address', TRUE)));
																		$phone_delivery = ucwords(strtolower($this->input->post('phone', TRUE)));
																		$email_delivery = ucwords(strtolower($this->input->post('email', TRUE)));

																		$t = $this->delivery_address->insert_delivery_address($order_my_id, $name_delivery, $address_delivery, $phone_delivery, $email_delivery);
																		if (!$t)
																			{
																				$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
																				$this->load->view('orderdetails', $data);
																			}
																			else
																			{
																				$data['delivery_address'] = $this->delivery_address->delivery_address_id($order_my_id);
																				$data['info'] = 'Successful inserting data';
																				$this->load->view('orderdetails', $data);
																			}
																	}
																	else
																	{
																		if ($this->input->post('feedback', TRUE))
																			{
																				$order_my_id = $this->input->post('order_my_id', TRUE);
																				$comments = ucwords(strtolower($this->input->post('feed', TRUE)));
		
																				$r = $this->feedback->insert_feedback($order_my_id, $comments);
																				if (!$r)
																					{
																						$data['info'] = 'Cant insert the data. Please try again later, sorry for the inconvenience';
																						$this->load->view('orderdetails', $data);
																					}
																					else
																					{
																						$data['feedback'] = $this->feedback->feedback_order_my_id($order_my_id);
																						$data['info'] = 'Successful inserting data';
																						$this->load->view('orderdetails', $data);
																					}
																			}
																			else
																			{
																			
																			}
																	}
															}
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function clientu()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$client_id = $this->uri->segment(3, 0);
						$data['sclient'] = $this->client->client_id($client_id);
						if (is_numeric($client_id))
							{
								$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
								if ($this->form_validation->run() == FALSE)
									{
										//form
										$this->load->view('clientu', $data);
									}
									else
									{
										//form processor
										if ($this->input->post('upd_client', TRUE))
											{
												$client = ucwords($this->input->post('client', TRUE));
												$address_client =  ucwords($this->input->post('address_client', TRUE));
												$phone_client = $this->input->post('phone_client', TRUE);
												$email_client = $this->input->post('email_client', TRUE);
												$facebook_id_client = $this->input->post('facebook_id_client', TRUE);
												$twitter_id_client = $this->input->post('twitter_id_client', TRUE);
												
												$d = $this->client->update_client($client_id, $client, $address_client, $phone_client, $email_client, $facebook_id_client, $twitter_id_client);
												//echo $this->db->last_query();
												if ($d)
													{
														$data['info'] = 'Failed to update data. Please try again later';
														$this->load->view('clientu', $data);
													}
													else
													{
														redirect('coms/order', 'location');
													}
											}
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		function test()
			{
				$order_my_id = $this->uri->segment(3, 0);
				echo $order_my_id.' order_my_id<br />';
				$j = $this->order_item->check_item($order_my_id);
				$p = $this->payment_info->check_payment($order_my_id);
				$l = $this->delivery_info->check_delivery($order_my_id);
				if ($j->num_rows() > 0)
					{
						echo $j->num_rows().' success';
					}
					else
					{
						echo 'failed';
					}
			}

		public function orderdel()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$order_my_id = $this->uri->segment(3, 0);
						$j = $this->delivery_address->delete_delivery_address_order_my_id($order_my_id);
						$e = $this->delivery_info->delete_delivery_info_order_my_id($order_my_id);
						$t = $this->order_item->delete_order_my_id($order_my_id);
						$y = $this->order_my->delete_order_my_id($order_my_id);
						$m = $this->payment_info->delete_payment_info_order_my_id($order_my_id);
						$u = $this->feedback->delete_feedback_order_my_id($order_my_id);
						redirect(base_url(), 'location');
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function feedbackr()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$order_my_id = $this->uri->segment(3, 0);
						$feedback_id = $this->uri->segment(4, 0);

						//nak kena detect only numeric sahaja.
						if (is_numeric($order_my_id) && is_numeric($feedback_id))
							{
								//order_my part
								$u = $this->feedback->delete_feedback_id($feedback_id);

								if (!$u)
									{
										$data['info'] = 'Sorry, cant delete the data. Please try again later';
										$this->load->view('home', $data);
									}
									else
									{
										//redirect('coms/payment/'.$order_my_id, 'location');
										redirect('coms/detailsorder/'.$order_my_id, 'location');
									}
							}
							else
							{
								$data['info'] = 'What are you trying to do?';
								$this->load->view('home', $data);
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function order_complete()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->load->library('pagination');
						$config['base_url'] = base_url().'coms/order_complete';
						//echo $this->view->order_list_view_complete1()->num_rows().'<br />';
						$config['total_rows'] = $this->view->order_list_view_complete1()->num_rows();
						$config['per_page'] = 5;

						$this->pagination->initialize($config);

						$data['query'] = $this->view->order_list_view_complete($config['per_page'], $this->uri->segment(3, 0));
						$this->load->view('main_complete', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function order_unclose()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->load->library('pagination');
						$config['base_url'] = base_url().'coms/order_unclose';
						//echo $this->view->order_list_view_unclose1()->num_rows().'<br />';
						$config['total_rows'] = $this->view->order_list_view_unclose_complete_all1()->num_rows();
						$config['per_page'] = 5;

						$this->pagination->initialize($config);

						$data['query'] = $this->view->order_list_view_unclose_complete_all2($config['per_page'], $this->uri->segment(3, 0));
						$this->load->view('main_unclose', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function order_unclose_delivery()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->load->library('pagination');
						$config['base_url'] = base_url().'coms/order_unclose_delivery';
						//echo $this->view->order_list_view_unclose1()->num_rows().'<br />';
						$config['total_rows'] = $this->view->order_list_view_unclose_pending_delivery1()->num_rows();
						$config['per_page'] = 5;

						$this->pagination->initialize($config);

						$data['query'] = $this->view->order_list_view_unclose_pending_delivery2($config['per_page'], $this->uri->segment(3, 0));
						$this->load->view('main_unclose_delivery', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function order_unclose_payment()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->load->library('pagination');
						$config['base_url'] = base_url().'coms/order_unclose_payment';
						//echo $this->view->order_list_view_unclose1()->num_rows().'<br />';
						$config['total_rows'] = $this->view->order_list_view_unclose_pending_payment1()->num_rows();
						$config['per_page'] = 5;

						$this->pagination->initialize($config);

						$data['query'] = $this->view->order_list_view_unclose_pending_payment2($config['per_page'], $this->uri->segment(3, 0));
						$this->load->view('main_unclose_payment', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function order_unclose_both()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->load->library('pagination');
						$config['base_url'] = base_url().'coms/order_unclose_both';
						//echo $this->view->order_list_view_unclose1()->num_rows().'<br />';
						$config['total_rows'] = $this->view->order_list_view_unclose_pending_both1()->num_rows();
						$config['per_page'] = 5;

						$this->pagination->initialize($config);

						$data['query'] = $this->view->order_list_view_unclose_pending_both2($config['per_page'], $this->uri->segment(3, 0));
						$this->load->view('main_unclose_both', $data);
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}



#############################################################################################################################
		public function logout()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$array = array 
								(
									'username' => '',
									'password' => '',
									'group' => '',
									'logged_in' => '',
								);
						$this->session->unset_userdata($array);
						redirect(base_url(), 'location');
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}
####################################################################################################################################
//Template Controller
/*
		public function home()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
							}
							else
							{
								//form processor
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}
*/
	}

/* End of file coms.php */
/* Location: ./application/controllers/coms.php */