<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

		class Login extends CI_Controller{

			function __construct(){
				parent::__construct();
				$this->load->model('m_login');
			}

			function index(){

				$data['title'] = "Masuk";

				$this->load->view('v_login',$data);

			}
			function proses(){
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$this->load->library('form_validation');

				$this->form_validation->set_rules('username','Username','required');
				$this->form_validation->set_rules('password','Password','required');

				if($this->form_validation->run() == TRUE){

					$cek = $this->m_login->cek_login($username,$password);

					if(count($cek) != 0){

						$data = array(
							'id' =>$id,
							'username' => $cek['username'],
							'level' => $cek['level']
							);

						$this->session->set_userdata($data);

						redirect('dashboard');

					}else{
					//username atau password salah

					echo "<div class='alert alert-danger'> Username atau Password anda salah </div>";

				}
				}else{

				//ada yang belum diisi 
				echo "<div class='alert alert-danger'>".validation_errors()."</div>";

			}
		}
			

			function logout()
			{
				$this->session->sess_destroy();
				redirect('login');
			}
		}