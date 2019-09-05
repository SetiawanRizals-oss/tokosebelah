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
		<p style="text-align: center;">Transaksi Produk</p>

		<div style="text-align: right;">
			<button class="btn btn-light active" onclick="window.location.href='/'">Home</button>
			<button class="btn btn-dark">Setting</button>
		</div>

		<div class="btn-group btn-group-toggle" data-toggle="buttons">
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/toko'">Toko</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/jenis'">Jenis</button>
		    <button class="btn btn-light btn-sm" onclick="window.location.href='/kota'">Kota</button>
		    <button class="btn btn-success btn-sm active" onclick="window.location.href='/produk'">Produk</button>
		</div><hr><br>

		<div>
			<span id="notif">
			</span>
		</div>
		<button type="button" class="btn btn-primary" data-toggle="modal" id="buttonAdd">Tambah</button>
		<div style="text-align: center;">
			<table class="table table-bordered" id="bioTable">
				<thead style="background-color: powderblue">
					<tr>
						<th rowspan="2">Kode Produk</th>
						<th rowspan="2">Nama Produk</th>
						<th rowspan="2">Status</th>
						<th colspan="4">Action</th>
					</tr>
					<tr>
						<th>Detail</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	<div class="modal" tabindex="-1" role="dialog" id="myModal">
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
									<td>
										<input id="kodeProduk" name="kodeProduk" type="text" placeholder="Kode Produk" required="">
									</td>
								</tr>
								<tr>
									<td>Nama Produk</td>
									<td>
										<input id="namaProduk" name="namaProduk" type="text" placeholder="Nama Produk" required="">
									</td>
								</tr>
								<tr>
									<td>Harga Produk</td>
									<td>
										<input id="hargaProduk" name="hargaProduk" type="text" placeholder="Harga Produk" required="">
									</td>
								</tr>
								<tr>
									<td>Kota</td>
									<td>
										<select id="kota" name="kota" required>
											<option value="">Pilih Kota</option>
											@foreach($kotaz as $kota)
											<option value="{{ $kota->kodeKota }}">{{ $kota->kodeKota }}</option>
											@endforeach
										</select>
									</td>
								</tr>
								<tr>
									<td>Jenis</td>
									<td>
										<select id="jenis" name="jenis" required>
											<option value="">Pilih Jenis</option>
											@foreach($jenisz as $jenis)
											<option value="{{ $jenis->kodeJenis }}">{{ $jenis->kodeJenis }}</option>
											@endforeach
										</select>
									</td>
								</tr>
								<tr>
									<td>Toko</td>
									<td>
										<select id="toko" name="toko" required>
											<option value="">Pilih Toko</option>
											@foreach($tokoz as $toko)
											<option value="{{ $toko->kodeToko }}">{{ $toko->kodeToko }}</option>
											@endforeach
										</select>
									</td>
								</tr>
							</table>
						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
						<h4 class="modal-title-delete" style="text-align: center;">Are you sure to delete this information?</h4>
					</div>
					<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
						<button class="btn btn-danger" id="delete_button">Delete</button>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>				
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
						<h4 class="modal-title-delete" style="text-align: center;">Are you sure to reactive this information?</h4>
					</div>
					<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
						<button class="btn btn-danger" id="aktifkan_button">Aktifkan</button>
						<button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>				
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
							<button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
			// alert(action);
			if (action == "Tambah Data") {
				if (kodeProduk.length > 5 || kodeProduk.length < 5) {
					alert('Karakter harus 5 digit');
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
							// if (data.errors) {
							// 	html = '<div class="alert alert-danger">';
							// 	for (var count = 0; count < data.errors.length; count++) {
							// 		html+='<p>'+data.errors[count]+'</p>';
							// 	}
							// 	html+='</div>';
							// }
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
					$('#action').val('Edit Data');
					$('.modal-title').text('ediiiit Data');
					$('#tombolaction').text('Edit Data');
					$('#myModal').modal('show');
				}
			});
		});

		$("#formProduk").on('submit',function(event){
			event.preventDefault();
			var action = $("#action").val(); //get value dari value dengan id action
			var kodeProduk = $("#kodeProduk").val(); //get value dari value dengan id action
			if (action == "Edit Data") {
				if (kodeProduk.length > 5 || kodeProduk.length < 5) {
					alert('Karakter harus 5 digit');
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
					$("#delete_button").text('Deleting . . . ');
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
					$('.modal-title').text('Detail Data');
					$('#actionDetail').text('Detail Data');
					$('#myModalDetail').modal('show');
				}
			});
		});

	});
</script>
</html>