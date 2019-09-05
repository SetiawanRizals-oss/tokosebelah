<!DOCTYPE html>
<html>
<head>
	<title>Toko</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
	<style type="text/css">

	</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>


</head>
<body>
	<div class="container">
	<h2>DATA TOKO</h2><hr>
	<table>
		<thead>
			<tr>
				<th><a href="/Kota"><button class="btn btn-success">Kota</button></a></th>
				<th><a href="/Kota"><button class="btn btn-success">Jenis</button></a></th>
				<th><a href="/Kota"><button class="btn btn-warning">Toko</button></a></th>
				<th><a href="/Kota"><button class="btn btn-success">Produk</button></a></th>
				
			</tr>
		</thead>
	</table>
	
	<button type="button" id="buttonAdd" class="btn btn-info">Tambah Data</button><br><br>

	<span id="notif">	
		
	</span>
<!--  class='table table-striped' -->
		<table id='bioTable' class='table table-striped';>
			<thead style=" background:seagreen ; color:white ;">
				<tr>
					<th>Kode Toko</th>
					<th>Nama Toko</th>
					<th>Status</th>
					<th>Lihat</th>
					<th>Ubah</th>
					<th>Hapus</th>
				</tr>
			</thead>
		</table>
	</div>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form id="formPelajaran">
	      	@csrf
		      <div class="modal-header">
		        <h5 class="modal-title-add" id="exampleModalLabel"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <input type="text" name="action" id="action"><br><br>

		        <table class="table">
		        	<tr>
		        		<td class="align-middle">Kode Toko</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="kodeToko" id="kodeToko" placeholder="Kode Toko..." required>
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Nama Toko</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="namaToko" id="namaToko" placeholder="Nama Toko..." required>
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Rating Toko</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="ratingToko" id="ratingToko" placeholder="Rating Toko..." required>
		        		</td>
		        	</tr>
		        </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" id="tombol_act" class="btn btn-primary"></button>
		      </div>
		  </form>
	    </div>
	  </div>
	</div>

<div class="modal fade" id="myModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form id="formPelajaran">
	      	@csrf
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Lihat Data</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <table class="table">
		        	<tr>
		        		<td class="align-middle">Kode Toko</td>
		        		<td id="kode_toko_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Nama Toko</td>
		        		<td id="nama_toko_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Rating Toko</td>
		        		<td id="rating_toko_detail"></td>
		        	</tr>
		        </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <!-- <button type="submit" id="tombol_act" class="btn btn-primary"></button> -->
		      </div>
		  </form>
	    </div>
	  </div>
	</div>

<!-- Modal Untuk Delete -->
	<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form id="formPelajaran">
		     <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<h4 class="modal-title" style="text-align: center;"> Kamu kenapa? gpp, aku minta maaf, y ...</h4>					
				</div>
				<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
					<button class="btn btn-secondary" id="delete_button">Hapus</button>
					<button type="button" class="btn btn-info" data-dismiss="modal">Batal</button>
		        <!-- <button type="submit" id="tombol_act" class="btn btn-primary"></button> -->
		      </div>
		  </form>
	    </div>
	  </div>
	</div>

<div class="modal fade" id="myModalAktif" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title-aktif" id="exampleModalLabel">Detail Data</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <!-- <input type="text" name="action" id="action"><br><br> -->
		        <h4 class="modal-title" style="text-align: center;">Aktifin data?</h4>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" id="tombol_aktif" class="btn btn-danger"></button>
		      </div>
	    </div>
	  </div>
	</div>

</body>
	<script type="text/javascript">
		$('#bioTable').DataTable({
 			processing : true,
 			serverside : true,
 			ajax:{
 				url: "/toko",
 			},
 			columns:[
 				{
 					data : 'kodeToko',
 					name : 'kodeToko'
 				},
 				{
 					data : 'namaToko',
 					name : 'namaToko'
 				},
 				/*{
 					data : 'ratingToko',
 					name : 'ratingToko'
 				},*/
 				{
 					data : 'status',
 					name : 'status',
 					orderable : false,
 				},
 				{
 					data : 'detail',
 					name : 'detail',
 					orderable : false,
 				},
 				{
 					data : 'edit',
 					name : 'edit',
 					orderable : false,
 				},
 				{
 					data : 'delete',
 					name : 'delete',
 					orderable : false,
 				}
 				
 			]
 		});
	$(document).ready(function(){
		$("#buttonAdd").click(function(){
			$('.modal-title-add').html('Tambah Data');
			$('#action').val('tambah');
			$('#tombol_act').text('Add');
			// $("#formPelajaran")[0].reset();
			$('#myModal').modal('show');
		});


		$("#formPelajaran").on("submit", function(e){
			event.preventDefault();
			var action = $("#action").val(); // get value
			var kodeToko = $("#kodeToko").val();
			// alert(action);
		

			if (action == "tambah") {
				// alert("Ajax untuk tambah");
				if (kodeToko.length > 5 || kodeToko.length < 5) {
					alert('Karakter harus 5 digit');
				}else{
					$.ajax({
						url:"/toko/add",
						method:"POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						dataType: "json",
						success:function(data){
							var html ='';
							$("#myModal").modal('hide');
							if (data.success) {
								html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat! </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#formPelajaran")[0].reset();
								
							}
							 $("#bioTable").DataTable().ajax.reload();
							if (data.error) {
								html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							}
							$("#notif").html(html);
						}
					});					
				}
			};
		});

			if (action == "edit") {
				// alert("Ajax untuk tambah");
				if (kodeToko.length > 6 || kodeToko.length < 6) {
					alert('Karakter harus 6 digit');
				}else{
					$("#formPelajaran").on("submit",function(event){
					$.ajax({
						url:"/toko/update",
						method:"POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						dataType: "json",
						success:function(data){
							var html ='';
							$("#myModal").modal('hide');
							if (data.success) {
								html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Selamat! </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#formPelajaran")[0].reset();
								// $("#formPelajaran").DataTable().ajax.reload();
							}
							if (data.error) {
								html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							}
							$("#notif").html(html);
						}
					
					});
				});			
			}
		}
		

		// edit
		$(document).on('click','.edit',function(){
			var id = $(this).attr('id');
			// alert(id);
			$.ajax({
				url:"/toko/edit/"+id,
				dataType: "json",
				success:function(html){
					$("#kodeToko").val(html.data[0].kodeToko);
					$("#namaToko").val(html.data[0].namaToko);
					$("#ratingToko").val(html.data[0].ratingToko);

					$('#action').val('edit');
					$('.modal-title-add').html('Ubah Data');
					$('#tombol_act').text('Update Data');
					$("#myModal").modal("show");
				}
			});
		});

		// detail
		$(document).on('click','.detail',function(){
			var id = $(this).attr('id');
			// alert(id);
			$.ajax({
				url:"/toko/detail/"+id,
				dataType: "json",
				success:function(html){
					console.log(html);
					$("#kode_toko_detail").text(html.data[0].kodeToko);
					$("#nama_toko_detail").text(html.data[0].namaToko);
					$("#rating_toko_detail").text(html.data[0].ratingToko);
				

					$("#myModalDetail").modal("show");
				}
			});
		});


		var id_delete;
		$(document).on('click','.delete',function(){

		id_delete = $(this).attr("id");
		$("#myModalDelete").modal('show');
		});//penutup delete(show modal)

		//action delete
		$("#delete_button").click(function(){
            $.ajax({
              url:"/toko/delete/"+id_delete,
              beforeSend:function(){
                $("#delete_button").text('Deleting...');
              },
              success:function(){
                setTimeout(function(){
                  $("#myModalDelete").modal('hide');
                  $("#delete_button").text('OK');
                  $("#bioTable").DataTable().ajax.reload();
                },50);
              }
            });
          });

		var id_aktif;
		$(document).on('click','.aktif',function(){
			id_aktif = $(this).attr('id');
			$('.modal-title-aktif').text('Aktif Data');
			$('#tombol_aktif').text('Aktif Data');
			$('#myModalAktif').modal('show');
		});

		// action aktif
		$("#tombol_aktif").click(function(){
			$.ajax({
				url:"/toko/aktif/"+id_aktif,
				beforeSend:function(){
					$("#tombol_delete").text('Aktifin...');
				},
				success:function(){
					setTimeout(function(){
						$("#myModalAktif").modal('hide');
						$("#tombol_aktif").text('OK');
						$("#bioTable").DataTable().ajax.reload();
					},500);
				}
			});
		});
	});

</script>

</html>