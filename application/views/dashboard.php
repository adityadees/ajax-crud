<div class="inner cover text-center">
	<h1 class="cover-heading">Selamat datang, <?= $this->data['token']['username']; ?></h1>
	<p class="lead alert alert-success">Silahkan cek persediaan barang anda
		<br>
		<a href="<?= base_url('barang')?>" class="btn btn-lg btn-default">Cek Sekarang</a>
	</p>
	<div class="alert alert-info">
		<h3><b><u>INFORMASI</u></b> </h3><br>
		<b>Master Barang :</b> <br>Melihat data dan stok barang<br><br>
		<b>Barang Masuk :</b><br> Melihat data barang masuk dan menambah stok barang<br><br>
		<b>Barang Keluar :</b><br> Melihat data barang keluar dan mengurangi stok barang<br><br>
	</div>
</div>

