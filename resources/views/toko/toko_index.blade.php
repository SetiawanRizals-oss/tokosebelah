<!DOCTYPE html>
<html>
<head>
	<title>tokosebelahdotcom</title>
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
	
	<center><img src="tokosebelah.jpg" width="280px" height="80px">
		<i><h4>Mulai Aja Dulu</h4></i></center>

		<div style="text-align: right;">
			<button class="btn btn-primary" onclick="window.location.href='/'">Home</button>
			<button class="btn btn-primary">Setting</button>
		</div>

		<div class="btn-group btn-group-toggle" data-toggle="buttons">
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

			<button class="btn btn-primary btn-sm" onclick="window.location.href='/index'">Kota</button>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button class="btn btn-primary btn-sm" onclick="window.location.href='/jenis'">Jenis</button>
			&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		    <button class="btn btn-warning btn-sm" onclick="window.location.href='/toko'">Toko</button>
		    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
		    <button class="btn btn-primary btn-sm" onclick="window.location.href='/produk'">Produk</button>
		</div>
		<hr>
		<br>
		<h5 style="text-align: center;">Data Toko</h5>
	
	<button type="button" id="buttonAdd" class="btn btn-info">Tambah Data</button><br><br>

	<span id="notif">	
		
	</span>
<!--  class='table table-striped' -->
		<table id='bioTable' class='table table-striped';>
			<thead style=" background:forestgreen ; color:black ;">
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
	      <form id="formPelajaran" onsubmit="return validatePijat()">
	      	@csrf
		      <div class="modal-header">
		        <h5 class="modal-title-add" id="exampleModalLabel"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <input type="hidden" name="action" id="action"><br><br>

		        <table class="table">
		        	<tr>
		        		<td class="align-middle">Kode Toko</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="kodeToko" id="kodeToko" placeholder="Kode Toko..." >
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Nama Toko</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="namaToko" id="namaToko" placeholder="Nama Toko..." >
		        		</td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">Rating Toko</td>
		        		<td>
		        			<input class="form-control input-lg" type="text" name="ratingToko" id="ratingToko" placeholder="Rating Toko..." >
		        		</td>
		        	</tr>
		        </table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
		        <button type="submit" id="tombol_act" class="btn btn-warning"></button>
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
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
					<h4 class="modal-title" style="text-align: center;"> Hapus Data?</h4>					
				</div>
				<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
					<button class="btn btn-danger" id="delete_button">Hapus</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
		       
		        <h4 class="modal-title" style="text-align: center;">Aktifkan?</h4>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" id="tombol_aktif" class="btn alert-primary"></button>
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
			$('#tombol_act').text('Tambah');
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
							 $("#bioTable").DataTable().ajax.reload();	

							$("#notif").html(html);
						}
					});					
				}
				if (action == "edit") {
			}
		}
	});

			
				
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
					$('#tombol_act').text('Ubah');
					$("#myModal").modal("show");
				}
			});
		});

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
								/*$("#bioTable").DataTable().ajax.reload();*/
							}
							if (data.error) {
								html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							}
							$("#notif").html(html);
						}
					
					});
				});			
			}

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
                $("#delete_button").text('Hapusin...');
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

function validatePijat(){
      var kodeToko = $("#kodeToko").val();
      var namaToko = $("#namaToko").val();
      var ratingToko = $("#ratingToko").val();

      if (kodeToko =="") {
        alert("Kode Toko tidak boleh kosong!");
        return false;
      }
      if (namaToko =="") {
        alert("Nama Toko tidak boleh kosong!");
        return false;
      }
      if (ratingToko =="") {
        alert("Kode Toko tidak boleh kosong!");
        return false;
      }
    }

</script>

</html>