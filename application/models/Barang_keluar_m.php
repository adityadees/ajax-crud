<?php
class Barang_keluar_m extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->data['table_name']    = 'barang_keluar';
		$this->data['primary_key']    = 'bk_id';
	}

	function simpan_barang($kobar,$jumlah,$user_id){
		$x=$this->db->query("UPDATE barang SET barang_stok = barang_stok-$jumlah WHERE barang_kode='$kobar'");
		
		$hasil=$this->db->query("INSERT INTO barang_keluar (barang_kode,bk_jumlah,user_id)VALUES('$kobar','$jumlah','$user_id')");
		return $hasil;
	}
}