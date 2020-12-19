<div class="mastfoot">
	<div class="inner">
		<p>APP GUDANG &copy; 2020</p>
	</div>
</div>


</div>

</div>

</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/script.js'?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#mydata').dataTable();
		tampil_data_barang();
		tampil_data_barang_masuk();
		tampil_data_barang_keluar();

		function tampil_data_barang(){
			$.ajax({
				type  : 'GET',
				url   : '<?php echo base_url()?>index.php/barang/data_barang',
				async : true,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<tr>'+
						'<td>'+data[i].barang_kode+'</td>'+
						'<td>'+data[i].barang_nama+'</td>'+
						'<td class="text-center">'+data[i].barang_stok+'</td>'+
						'<td>'+data[i].barang_harga+'</td>'+
						'<td style="text-align:right;">'+
						'<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="'+data[i].barang_kode+'">Edit</a>'+' '+
						'<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="'+data[i].barang_kode+'">Hapus</a>'+
						'</td>'+
						'</tr>';
					}
					$('#show_data').html(html);
				}

			});
		}

		$('#show_data').on('click','.item_edit',function(){
			var id=$(this).attr('data');
			$.ajax({
				type : "GET",
				url  : "<?php echo base_url('index.php/barang/get_barang')?>",
				dataType : "JSON",
				data : {id:id},
				success: function(data){
					$.each(data,function(barang_kode, barang_nama, barang_harga){
						$('#ModalaEdit').modal('show');
						$('[name="kobar_edit"]').val(data.barang_kode);
						$('[name="nabar_edit"]').val(data.barang_nama);
						$('[name="harga_edit"]').val(data.barang_harga);
					});
				}
			});
			return false;
		});


		$('#show_data').on('click','.item_hapus',function(){
			var id=$(this).attr('data');
			$('#ModalHapus').modal('show');
			$('[name="kode"]').val(id);
		});

		$('#btn_simpan').on('click',function(){
			var kobar=$('#kode_barang').val();
			var nabar=$('#nama_barang').val();
			var harga=$('#harga').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('index.php/barang/simpan_barang')?>",
				dataType : "JSON",
				data : {kobar:kobar , nabar:nabar, harga:harga},
				success: function(data){
					$('[name="kobar"]').val("");
					$('[name="nabar"]').val("");
					$('[name="harga"]').val("");
					$('#ModalaAdd').modal('hide');
					tampil_data_barang();
				}
			});
			swal("Success!", "Berhasil Menambah Data Barang!", "success");
			return false;
		});

		$('#btn_update').on('click',function(){
			var kobar=$('#kode_barang2').val();
			var nabar=$('#nama_barang2').val();
			var harga=$('#harga2').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('index.php/barang/update_barang')?>",
				dataType : "JSON",
				data : {kobar:kobar , nabar:nabar, harga:harga},
				success: function(data){
					$('[name="kobar_edit"]').val("");
					$('[name="nabar_edit"]').val("");
					$('[name="harga_edit"]').val("");
					$('#ModalaEdit').modal('hide');
					tampil_data_barang();
				}
			});
			swal("Success!", "Berhasil Merubah Data Barang!", "success");
			return false;
		});

		$('#btn_hapus').on('click',function(){
			var kode=$('#textkode').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('index.php/barang/hapus_barang')?>",
				dataType : "JSON",
				data : {kode: kode},
				success: function(data){
					$('#ModalHapus').modal('hide');
					tampil_data_barang();
				}
			});
			swal("Success!", "Berhasil Menghapus Data Barang!", "success");
			return false;
		});



		function tampil_data_barang_masuk(){
			$.ajax({
				type  : 'GET',
				url   : '<?php echo base_url()?>index.php/barang_masuk/data_barang',
				async : true,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<tr>'+
						'<td>'+data[i].barang_kode+'</td>'+
						'<td class="text-center">'+data[i].bm_jumlah+'</td>'+
						'<td class="text-center">'+data[i].bm_tanggal+'</td>'+
						'</tr>';
					}
					$('#show_data_masuk').html(html);
				}

			});
		}

		$('#btn_simpan_masuk').on('click',function(){
			var kode_barang=$('#kode_barang').val();
			var jumlah=$('#jumlah').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('index.php/barang_masuk/simpan_barang')?>",
				dataType : "JSON",
				data : {kode_barang:kode_barang , jumlah:jumlah},
				success: function(data){
					$('[name="kode_barang"]').val("");
					$('[name="jumlah"]').val("");
					$('#ModalaAdd').modal('hide');
					tampil_data_barang_masuk();
				}
			});
			swal("Success!", "Berhasil Menambah Stok Barang!", "success");
			return false;
		});



		function tampil_data_barang_keluar(){
			$.ajax({
				type  : 'GET',
				url   : '<?php echo base_url()?>index.php/barang_keluar/data_barang',
				async : true,
				dataType : 'json',
				success : function(data){
					var html = '';
					var i;
					for(i=0; i<data.length; i++){
						html += '<tr>'+
						'<td>'+data[i].barang_kode+'</td>'+
						'<td class="text-center">'+data[i].bk_jumlah+'</td>'+
						'<td class="text-center">'+data[i].bk_tanggal+'</td>'+
						'</tr>';
					}
					$('#show_data_keluar').html(html);
				}

			});
		}

		$('#btn_simpan_keluar').on('click',function(){
			var kode_barang=$('#kode_barang').val();
			var jumlah=$('#jumlah').val();
			$.ajax({
				type : "POST",
				url  : "<?php echo base_url('index.php/barang_keluar/simpan_barang')?>",
				dataType : "JSON",
				data : {kode_barang:kode_barang , jumlah:jumlah},
				success: function(data){
					$('[name="kode_barang"]').val("");
					$('[name="jumlah"]').val("");
					$('#ModalaAdd').modal('hide');
					tampil_data_barang_keluar();
				}
			});
			swal("Success!", "Berhasil Mengurangi Stok Barang!", "success");
			return false;
		});


	});

</script>
</body>
</html>
