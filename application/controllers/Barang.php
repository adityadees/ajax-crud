<?php
class Barang extends MY_Controller{
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
		$this->load->model('user_m');
		$this->load->model('barang_m');
	}

	function index(){
		$this->data['title']    = 'Master Barang';
		$this->data['content']  = 'barang';
		$this->template($this->data, $this->module);
	}

	function data_barang(){
		$data=$this->barang_m->get();
		echo json_encode($data);
	}

	function get_barang(){
		$kobar=$this->input->get('id');
		$data=$this->barang_m->get_barang_by_kode($kobar);
		echo json_encode($data);
	}

	function simpan_barang(){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$harga=$this->input->post('harga');
		$data=$this->barang_m->insert(['barang_kode'=>$kobar,'barang_nama'=>$nabar,'barang_harga'=>$harga,'user_id'=>$this->data['token']['user_id']]);
		echo json_encode($data);
	}

	function update_barang(){
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$harga=$this->input->post('harga');
		$data=$this->barang_m->update($kobar, ['barang_nama' =>$nabar,'barang_harga' => $harga]);
		echo json_encode($data);
	}

	function hapus_barang(){
		$kobar=$this->input->post('kode');
		$data=$this->barang_m->delete($kobar);
		echo json_encode($data);
	}

}