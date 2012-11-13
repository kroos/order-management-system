<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller
	{
		public function index()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('report/home');
							}
							else
							{
								//form processor
								if($this->input->post('test', TRUE))
									{
										$data['start'] = $this->input->post('from_date', TRUE);
										$data['end'] = $this->input->post('untill_date', TRUE);

										$data['query'] = $this->view->sale_view($data['start'], $data['end']);
										$this->load->view('report/home', $data);
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function topitem()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('report/topitem');
							}
							else
							{
								//form processor
								if($this->input->post('test', TRUE))
									{
										$data['start'] = $this->input->post('from_date', TRUE);
										$data['end'] = $this->input->post('untill_date', TRUE);

										$data['query'] = $this->view->topitem($data['start'], $data['end']);
										$this->load->view('report/topitem', $data);
									}
							}
					}
					else
					{
						redirect(base_url(), 'location');
					}
			}

		public function topsize()
			{
				if ($this->session->userdata('logged_in') == TRUE)
					{
						//process
						$this->form_validation->set_error_delimiters('&nbsp;&nbsp;<font color="#FF0000">', '</font>&nbsp;&nbsp;');
						if ($this->form_validation->run() == FALSE)
							{
								//form
								$this->load->view('report/topsize');
							}
							else
							{
								//form processor
								if($this->input->post('test', TRUE))
									{
										$data['start'] = $this->input->post('from_date', TRUE);
										$data['end'] = $this->input->post('untill_date', TRUE);

										$data['query'] = $this->view->topsize($data['start'], $data['end']);
										$this->load->view('report/topsize', $data);
									}
							}
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