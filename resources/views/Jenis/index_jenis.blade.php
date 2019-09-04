</!DOCTYPE html>
<html>
<head>
	<title>Data Jenis</title>
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
	<p style="text-align: center;">Data Jenis</p>
	<button type="button" class="btn btn-primary" data-toggle="modal" id="modalAdd">
		Tambah
	</button>
<table class="table table-striped" > 
	<thead>
          <tr>
          <th>Kode Jenis </th>
          <th>Nama Jenis</th>
          <th>Is Delete</th>
          <th>Lihat</th>
          <th>Ubah</th>
          <th>Hapus</th>
    </tr>
   </thead>
</table>	

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="formdataLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
          <form id="formKendaraan" ><!-- onsubmit="return validasi()"> -->
        @csrf
			      <div class="modal-header">
			        <h5 class="modal-titleAdd" id="yuuki">Input Biodata</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			         </button>
			         </div>
			       
			      	<div class="modal-body">

			      		<input type="text" name="action" id="action">
						<table class="table table-striped">
							<tr>
	    		<td>Kode Jenis</td>
	    		<td>:</td>
	    		<td><input type="text" id="kode_kendaraan" name="kode_kendaraan" placeholder="kode kendaraan" required></td>
	    	</tr>

	       <tr>
	       	<td>Nama Jenis</td>
	     	<td>:</td>
	     	<td><input type="text">
	     	</td>
	       </tr>

				<tr>
	       	<td>Promo Jenis</td>
	     	<td>:</td>
	     	<td><input type="text" id="nama_kendaraan" name="nama_kendaraan" placeholder="nama_kendaraan" required></td>
	       </tr>
				
	      </table>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			        	<button type="submit" id="tombol_action" class="btn btn-primary">Tambah Data</button>
			      	</div>
			  </form>
		    </div>
		  </div>
		</div>





</body>
<script type="text/javascript">
$(document).ready(function(){
$("#modalAdd").click(function(){
$(".modal-titleAdd").text('Tambah data');
$("#tombol_action").text('Tambah Data');
$("#action").val('tambah');
$("#myModal").modal('show');
  });
});



</script>
</html>