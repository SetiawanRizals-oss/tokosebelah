<!DOCTYPE html>
<html>
<head>
	<title>tokosebelah | Ntar aja mulainya</title>
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
            <button class="btn btn-warning active" onclick="window.location.href='/'">Home</button>
			<button class="btn btn-primary" onclick="window.location.href='/settings'">Setting</button>

		</div>
<hr>
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
		    <button class="btn btn-primary btn-sm" onclick="window.location.href='/produk'">Produk</button>
		</div><br>

		<div>
			<br>
			<br>
			<table class="table table-bordered" id="bioTable">
				<thead style="background-color: forestgreen; color: white">
					<tr>
						<th>Nama Produk</th>
						<th>Harga Produk</th>
						<th>Nama Kota</th>
						<th>Nama Jenis</th>
						<th>Nama Toko</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</body>
<script type="text/javascript">
	$(document).ready(function(){
		$("#bioTable").DataTable({
			processing : true,
			serverside : true,
			ajax:{
				url : "/halamanutama",
			},
			columns:[
			{
				data: 'namaProduk',
				name: 'namaProduk'
			},
			{
				data: 'hargaProduk',
				name: 'hargaProduk'
			},
			{
				data: 'namaToko',
				name: 'namaToko'
			},
			{
				data: 'namaJenis',
				name: 'namaJenis'
			},
			{
				data: 'namaKota',
				name: 'namaKota'
			}
			]
		});
	});
</script>
</html>