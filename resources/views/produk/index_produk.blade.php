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
						<th rowspan="2">Aksi</th>
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
										<select id="kota" name="kota">
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
										<select id="jenis" name="jenis">
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
										<select id="toko" name="toko">
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
	});
</script>
</html>