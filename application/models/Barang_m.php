<?php
class Barang_m extends MY_Model{

	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']    = 'barang';
		$this->data['primary_key']    = 'barang_kode';
	}
	
	function get_barang_by_kode($kobar){
		$hsl=$this->db->query("SELECT * FROM barang WHERE barang_kode='$kobar'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'barang_kode' => $data->barang_kode,
					'barang_nama' => $data->barang_nama,
					'barang_harga' => $data->barang_harga,
					'barang_stok' => $data->barang_stok,
				);
			}
		}
		return $hasil;
	}

}