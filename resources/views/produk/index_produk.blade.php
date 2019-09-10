<!DOCTYPE html>
<html>
<head>
	<title>Transakasi Produk</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
	<style type="text/css">
		table, th, td{
			padding: 5px;
			text-align: center;
		}
	</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
	<div class="container">
		<center> <img src ="uit.jpg" height="80" width="280">
			<i><h4>Mulai Aja dulu</h4></i>
		</center>

		<div style="text-align: right;">
			<button class="btn btn-light active" onclick="window.location.href='/'">Home</button>
			<button class="btn btn-dark">Setting</button>
		</div>

		<div class="btn-group btn-group-toggle" data-toggle="buttons">
            &emsp; &emsp;&emsp; &emsp; &emsp; &emsp;
		    <button type ="button"class="btn btn-primary btn-sm ;" onclick="window.location.href='/kota'" >Kota
		    </button>
		    &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 

		    <button class="btn btn-primary btn-sm" onclick="window.location.href='/jenis'">Jenis
		    </button>
		     &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 
		   
		    <button class="btn btn-primary btn-sm" onclick="window.location.href='/toko'">Toko</button>
		     &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 
		    <button class="btn btn-warning btn-sm active" onclick="window.location.href='/produk'">Produk</button>
		</div>
		<br>
		<br>
		<h5 style="text-align: center;">Transaksi Produk</h5>
		<div>
			<span id="notif"></span>
		</div>
		<div class="container">
			<button type="button" class="btn btn-primary" data-toggle="modal" id="buttonAdd">Tambah</button>
		</div>
		<br>
		<div>
			<table class="table table-bordered" id="bioTable" style="width: 100%">
				<thead style="background-color: forestgreen; color: white">
					<tr>
						<th rowspan="2">Kode Produk</th>
						<th rowspan="2">Nama Produk</th>
						<th rowspan="2">Status</th>
						<th colspan="4">Aksi</th>
					</tr>
					<tr>
						<th>Lihat</th>
						<th>Ubah</th>
						<th>Hapus</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		<div class="modal" tabindex="-1" role="dialog" id="myModal">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="formProduk" onsubmit="return validate()">
						@csrf
						<div class="modal-header">
							<h5 class="modal-title">Modal Title</h5>
							
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
					      	<input type="hidden" name="action" id="action">
							<table class="table table-bordered" id="bioTable">
								<tr>
									<td>Kode Produk</td>
									<td>
										<input id="kodeProduk" name="kodeProduk" type="text" placeholder="Kode Produk">
									</td>
								</tr>
								<tr>
									<td>Nama Produk</td>
									<td>
										<input id="namaProduk" name="namaProduk" type="text" placeholder="Nama Produk">
									</td>
								</tr>
								<tr>
									<td>Harga Produk</td>
									<td>
										<input id="hargaProduk" name="hargaProduk" type="text" placeholder="Harga Produk">
									</td>
								</tr>
								<tr>
									<td>Kota</td>
									<td>
										<select id="kota" name="kota">
											<option value="">Pilih Kota</option>
											@foreach($kotaz as $kota)
											<option value="{{ $kota->kodeKota }}">{{ $kota->namaKota }}</option>
											@endforeach
										</select>
									</td>
								</tr>
								<tr>
									<td>Jenis</td>
									<td>
										<select id="jenis" name="jenis">
											<option value="">Pilih Jenis</option>
											@foreach($jenisz as $jenis)
											<option value="{{ $jenis->kodeJenis }}">{{ $jenis->namaJenis }}</option>
											@endforeach
										</select>
									</td>
								</tr>
								<tr>
									<td>Toko</td>
									<td>
										<select id="toko" name="toko">
											<option value="">Pilih Toko</option>
											@foreach($tokoz as $toko)
											<option value="{{ $toko->kodeToko }}">{{ $toko->namaToko }}</option>
											@endforeach
										</select>
									</td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" id="tombolaction" class="btn btn-primary">Save changes</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="modal fade" id="myModalDelete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top: 100px">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" arial-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<h4 class="modal-title-delete" style="text-align: center;">Anda yakin akan menghapus data?</h4>
					</div>
					<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
						<button class="btn btn-danger" id="delete_button">Hapus</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>				
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalAktifkan">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top: 100px">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" arial-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<h4 class="modal-title-delete" style="text-align: center;">Anda yakin akan mengaktifkan data?</h4>
					</div>
					<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
						<button class="btn btn-danger" id="aktifkan_button">Aktifkan</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>				
					</div>
				</div>
			</div>
		</div>

		<div class="modal" tabindex="-1" role="dialog" id="myModalDetail">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form id="formProduk">
						@csrf
						<div class="modal-header">
							<h5 class="modal-title">Modal Title</h5>
							
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
					      	<input type="hidden" name="action" id="action">
							<table class="table table-bordered" id="bioTable">
								<tr>
									<td>Kode Produk</td>
									<td id="kodeProdukDetail">
									</td>
								</tr>
								<tr>
									<td>Nama Produk</td>
									<td id="namaProdukDetail">
									</td>
								</tr>
								<tr>
									<td>Harga Produk</td>
									<td id="hargaProdukDetail">
									</td>
								</tr>
								<tr>
									<td>Kota</td>
									<td id="kotaDetail">
									</td>
								</tr>
								<tr>
									<td>Jenis</td>
									<td id="jenisDetail">
									</td>
								</tr>
								<tr>
									<td>Toko</td>
									<td id="tokoDetail">
									</td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#buttonAdd").click(function(){
			$('#action').val('Tambah Data');
			$('.modal-title').text('Tambah Data');
			$('#tombolaction').text('Tambah Data');
			$('#myModal').modal('show');
		});

		$("#bioTable").DataTable({
			processing : true,
			serverside : true,
			ajax:{
				url : "/produk",
			},
			columns:[
			{
				data: 'kodeProduk',
				name: 'kodeProduk'
			},
			{
				data: 'namaProduk',
				name: 'namaProduk'
			},
			{
				data: 'aksi',
				name: 'aksi',
				orderable: false
			},
			{
				data: 'detail',
				name: 'detail',
				orderable: false
			},
			{
				data: 'edit',
				name: 'edit',
				orderable: false
			},
			{
				data: 'delete',
				name: 'delete',
				orderable: false
			}
			]
		});

		$("#formProduk").on('submit',function(event){
			event.preventDefault();
			var action = $("#action").val(); //get value dari value dengan id action
			var kodeProduk = $("#kodeProduk").val(); //get value dari value dengan id action
			var namaProduk = $("#namaProduk").val(); //get value dari value dengan id action
			var hargaProduk = $("#hargaProduk").val(); //get value dari value dengan id action
			var kodeKota = $("#kota").val(); //get value dari value dengan id action
			var kodeJenis = $("#jenis").val(); //get value dari value dengan id action
			var kodeToko = $("#toko").val(); //get value dari value dengan id action
			if (action == "Tambah Data") {
					if (kodeProduk.length > 5 || kodeProduk.length < 5) {
						alert('Kode produk harus 5 digit');
					} else if (namaProduk == "") {
						alert('Nama produk harus diisi');
					} else if (hargaProduk == "") {
						alert('Harga produk harus diisi');
					} else if (kodeKota == "") {
						alert('Kode kota harus diisi');
					} else if (kodeJenis == "") {
						alert('Kode jenis harus diisi');
					} else if (kodeToko == "") {
						alert('Kode toko harus diisi');
					} else {
					$.ajax({
						url:"/produk/add",
						method: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						dataType: "json",
						success:function(data){
							var html = '';
							$('#myModal').modal('hide');
							if (data.success) {
								html='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat! </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#bioTable").DataTable().ajax.reload(); //untuk reload fungsi ajax
								$("#formProduk")[0].reset() // menggunakan id form
							}
							if (data.error) {
								html='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal! </strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								/*$("#ModalEdit")[0].reset();*/
								$("#bioTable").DataTable().ajax.reload(); //untuk reload fungsi ajax
								$("#formProduk")[0].reset() // menggunakan id form
							}
							$("#notif").html(html);
						}
					});
				}
			}
		});

		$(document).on('click','.edit',function(){ //jika tombol berada difile lain
			var id = $(this).attr('id');
			$.ajax({
				url:"/produk/"+id+"/edit",
				dataType: "json",
				success:function(html){
					$('#kodeProduk').val(html.data[0].kodeProduk);
					$('#namaProduk').val(html.data[0].namaProduk);
					$('#hargaProduk').val(html.data[0].hargaProduk);
					$('#kota').val(html.data[0].kodeKota);
					$('#jenis').val(html.data[0].kodeJenis);
					$('#toko').val(html.data[0].kodeToko);
					$('#action').val('Ubah Data');
					$('.modal-title').text('Ubah Data');
					$('#tombolaction').text('Ubah Data');
					$('#myModal').modal('show');
				}
			});
		});

		$("#formProduk").on('submit',function(event){
			event.preventDefault();
			var action = $("#action").val(); //get value dari value dengan id action
			var kodeProduk = $("#kodeProduk").val(); //get value dari value dengan id action
			if (action == "Ubah Data") {
				if (kodeProduk.length > 5 || kodeProduk.length < 5) {
					alert('Kode produk harus 5 digit');
				} else if (namaProduk.length == 0) {
					alert('Nama produk harus diisi');
				} else {
					$.ajax({
						url:"/produk/update",
						method: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						dataType: "json",
						success:function(data){
							var html = '';
							$('#myModal').modal('hide');
							if (data.success) {
								html='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat! </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#bioTable").DataTable().ajax.reload(); //untuk reload fungsi ajax
								$("#formProduk")[0].reset() // menggunakan id form
								$("#notif").html(html);
							}
							// $("#formProduk")[0].reset() // menggunakan id form
							$("#notif").html(html);
						}
					});
				}
		 	}
		});

		var id_delete;
		$(document).on('click','.delete',function(){ //jika tombol berada difile lain
			id_delete = $(this).attr('id');
			$("#myModalDelete").modal("show");			
		});

		//action delete
		$("#delete_button").click(function(){
			$.ajax({
				url:"/produk/destroy/"+id_delete,
				
				beforeSend:function(){
					$("#delete_button").text('Sedang mengahapus . . . ');
				},
				success:function(){
					setTimeout(function(){
						$("#myModalDelete").modal('hide');

						$("#delete_button").text('OK');
						$("#bioTable").DataTable().ajax.reload();
					},500);

				}
			});
		});//action delete

		var id_aktif;
		$(document).on('click','.aktifkan',function(){ //jika tombol berada difile lain
			id_aktif = $(this).attr('id');
			$("#myModalAktifkan").modal("show");			
		});

		//action aktifkan
		$("#aktifkan_button").click(function(){
			$.ajax({
				url:"/produk/aktif/"+id_aktif,
				
				beforeSend:function(){
					$("#delete_button").text('Deleting . . . ');
				},
				success:function(){
					setTimeout(function(){
						$("#myModalAktifkan").modal('hide');
						$("#delete_button").text('OK');
						$("#bioTable").DataTable().ajax.reload();
					},500);
				}
			});
		});//action aktifkan

		var id_detail;
		$(document).on('click','.detail',function(){ //jika tombol berada difile lain
			var id_detail = $(this).attr('id');
			$.ajax({
				url:"/produk/detail/"+id_detail,
				dataType: "json",
				success:function(html){
					$('#kodeProdukDetail').text(html.data[0].kodeProduk);
					$('#namaProdukDetail').text(html.data[0].namaProduk);
					$('#hargaProdukDetail').text(html.data[0].hargaProduk);
					$('#kotaDetail').text(html.data[0].kodeKota);
					$('#jenisDetail').text(html.data[0].kodeJenis);
					$('#tokoDetail').text(html.data[0].kodeToko);
					$('.modal-title').text('Lihat Data');
					$('#actionDetail').text('Lihat Data');
					$('#myModalDetail').modal('show');
				}
			});
		});
	});

</script>
</html>