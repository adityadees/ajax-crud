<?php
class Barang_masuk extends MY_Controller{
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
		$this->load->model('barang_m');
		$this->load->model('barang_masuk_m');
	}

	function index(){
		$this->data['title']    = 'Barang Masuk';
		$this->data['content']  = 'barang_masuk';
		$this->data['barang'] = $this->barang_m->get();
		$this->template($this->data, $this->module);
	}

	function data_barang(){
		$data=$this->barang_masuk_m->get();
		echo json_encode($data);
	}

	function simpan_barang(){
		$kode_barang=$this->input->post('kode_barang');
		$jumlah=$this->input->post('jumlah');
		$data=$this->barang_masuk_m->simpan_barang($kode_barang,$jumlah,$this->data['token']['user_id']);
		echo json_encode($data);
	}

}