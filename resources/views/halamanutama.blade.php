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
            <button class="btn btn-warning" onclick="window.location.href='/'">Home</button>
			<button class="btn btn-primary" onclick="window.location.href='/settings'">Setting</button>

		</div>
         <hr>
		



		<div>
			<table class="table table-bordered" id="bioTable">
				<thead style="background-color: powderblue">
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
				data: 'kodeToko',
				name: 'kodeToko'
			},
			{
				data: 'kodeJenis',
				name: 'kodeJenis'
			},
			{
				data: 'kodeKota',
				name: 'kodeKota'
			}
			]
		});
	});
</script>
</html>