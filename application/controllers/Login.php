<?php
defined('BASEPATH') OR exit('No direct script allowed');
class Login extends MY_Controller{

	public function __construct(){
		parent::__construct();

		$token = $this->session->userdata('token');
		$this->load->model('user_m');
		if (isset($token))
		{
			redirect('dashboard');
		}
	}

	public function index(){
		$this->data['title']    = 'Login';
		if(isset($_POST['login'])){
			
			$username = $this->input->post('username');
			$cek_user = $this->user_m->get(['user_username' => $username]);

			if(count($cek_user) == 0){
				$this->flashmsg('Tidak ada data', 'danger');
				redirect('dashboard');
			} else {

				$data = [
					'user_username'	=>	$username,
					'user_password'	=>	md5($this->post('password')),
				];

				$user = $this->user_m->get_row($data);

				if(isset($user)){
					$resource = [
						'user_id'	=> $user->user_id,
						'username'	=> $user->user_username,
					];

					$this->data['resess'] 	= $resource;
					$this->data['message'] 	= 'Auth success';
					$this->data['info'] 	= [
						'status' 	=> 'ok',
						'response'	=> 200
					];
				} else {
					$this->data['message'] 	= 'Wrong username or password';
					$this->data['info'] 	= [
						'status'	=> 'fail',
						'response'	=> 502
					];
				}
				if($this->data['info']['status'] === 'ok'){
					$this->flashadmin($this->data['message'], 'green');
					$this->session->set_userdata(['token' => $this->data['resess']]);
					redirect('dashboard');
				} else {
					$this->flashadmin($this->data['message'], 'red');
					redirect('dashboard');
				}	

			}
		}
		$this->load->view('login', $this->data);
	}

}
