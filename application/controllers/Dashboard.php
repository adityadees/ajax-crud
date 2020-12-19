<?php
class Dashboard extends MY_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->module = '';

		$this->data['token'] = $this->session->userdata('token');
		if (!isset($this->data['token'])) {
			$this->session->sess_destroy();
			$this->flashmsg('Anda harus login untuk mengakses halaman tersebut', 'warning');
			redirect('login');
			exit;
		}
	}

	public function index(){		
		$this->data['title']    = 'Dashboard';
		$this->data['content']  = 'dashboard';
		$this->template($this->data, $this->module);
	}


}