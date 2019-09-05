<!DOCTYPE html>
<html>
<head>
	<title>Kota</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
</head>
<body>
	<div class="container">
		<h1 style="text-align: center;">Data Kota</h1>
		<div>
			<button type="button" class="btn btn-primary" id="buttonAdd">Tambah</button>
			<br><br>
			<span id="notif"></span>
		</div>
		<br>
		<table id="myTable" class="table table-hiver" >
			<thead style="text-align: center;">
				<tr>
					<th>kodeKota</th>
					<th>namaKota</th>
					<th>Status</th>
					<th>lihat</th>
					<th>ubah</th>
					<th>hapus</th>
				</tr>
			</thead>
		</table>
	</div>
<!-- Modal Tambah-->
<div id="myModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    	<form id="formKota">
    		@csrf
		      <div class="modal-header">
		        <h5 class="modal-title-add" id="exampleModalLabel"></h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		      	<input class="form-control input-lg" type="text" name="action" id="action">
		       <table class="table">
		       	<tr>
		       		<td>kodeKota</td>
		       		<td><input type="text" name="kodeKota" id="kodeKota" placeholder="Kode Kota" required=""></td>
		       	</tr>
		       	<tr>
		       		<td>namaKota</td>
		       		<td><input type="text" name="namaKota" id="namaKota" placeholder="Nama Kota" required=""></td>
		       	</tr>
		       	<tr>
		       		<td>luasKota</td>
		       		<td><input type="text" name="luasKota" id="luasKota" placeholder="luas Kota" required=""></td>
		       	</tr>
		       </table>
		         </div>
			 	  <div class="modal-footer">
		       <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
		        <button type="submit" class="btn btn-primary" id="tombol_action">OKE</button>
		      </div>
	    </form>
	 </div>
  </div>
</div>
		<!-- Modal Detail-->
<div class="modal fade" id="myModalDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <form id="formKota">
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
		        		<td class="align-middle">kodeKota</td>
		        		<td id="kodeKota_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">namaKota</td>
		        		<td id="namaKota_detail"></td>
		        	</tr>
		        	<tr>
		        		<td class="align-middle">luasKota</td>
		        		<td id="luasKota_detail"></td>
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
	      <form id="formKota">
		     <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<h4 class="modal-title" style="text-align: center;"> Delete---</h4>					
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
	$('#myTable').DataTable({
				processing : true,
				serverside:true,
				ajax:{
					url: '/index',
				},
				columns:[
					{
						data:'kodeKota',
						name:'kodeKota'
					},
					{
						data:'namaKota',
						name:'namaKota'
					},
					{
						data:'action',
						name:'action',
						orderable:false
					},
					{
						data:'detail',
						name:'detail',
						orderable:false
					},
					{
						data:'edit',
						name:'edit',
						orderable:false
					},
					{
						data:'delete',
						name:'delete',
						orderable:false
					}
					
					
				]
		});

	$(document).ready(function() {
		$("#buttonAdd").click(function(){
			$(".modal-title").text('Tambah Data');//.buat class
			$("#tombol_action").text('OK');//#buat id
			$("#action").val('Tambah');
			$("#myModal").modal('show');		
			});
		
			
 		$("#formKota").on("submit", function(e){
			event.preventDefault();
			var action = $("#action").val(); // get value
			var kodeKota = $("#kodeKota").val();
			/*alert(kodeKota);*/
			
			if (action == "Tambah") {
				// alert(action);
				// alert("Ajax untuk tambah");
				if (kodeKota.length > 5 || kodeKota.length < 5) {
					alert('Karakter harus 5 digit');
				}
				else{
					$.ajax({
						url:"/kota/add",
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
								$("#formKota")[0].reset();

							}
							$("#myTable").DataTable().ajax.reload();
							if (data.error) {
								html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
								$("#formKota")[0].reset();
							}
							$("#myTable").DataTable().ajax.reload();
							$("#notif").html(html);
						}
					});					
				}
				
			}
		});
 		

		$(document).ready(function() {
		$("#buttonEdit").click(function(){
			$(".modal-title").text('Edit');//.buat class
			$("#tombol_action").text('OK');//#buat id
			$("#action").val('Edit');
			$("#myModal").modal('show');		
			});
		});

		$(document).on('click','.edit',function(){
				var id = $(this).attr('id');
				// alert(id);

				$.ajax({
					url:"/kota/edit/"+id,
					dataType: "json",
					success:function(html){
						$("#kodeKota").val(html.data[0].kodeKota);
						$("#namaKota").val(html.data[0].namaKota);
						$("#luasKota").val(html.data[0].luasKota);

						$('#action').val('edit');
						$('.modal-title-add').html('Ubah Data');
						$('#tombol_act').text('Update Data');
						$("#myModal").modal("show");
					}
				});
			});
		
					$("#formKota").on("submit",function(event){
					event.preventDefault();
					$.ajax({
						url:"kota/update",
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
								$("#formKota")[0].reset();
								$("#myTable").DataTable().ajax.reload();
							}
							if (data.error) {
								html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong></strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							}
							$("#notif").html(html);
						}
					
					});
				});			

		// detail
		$(document).on('click','.detail',function(){
			var id = $(this).attr('id');
			// alert(id);
			$.ajax({
				url:"/kota/detail/"+id,
				dataType: "json",
				success:function(html){
					console.log(html);
					$("#kodeKota_detail").text(html.data[0].kodeKota);
					$("#namaKota_detail").text(html.data[0].namaKota);
					$("#luasKota_detail").text(html.data[0].luasKota);
				
					$("#myModalDetail").modal("show");
				}
			});
		});
		// delete
		var id_delete;
		$(document).on('click','.delete',function(){

		id_delete = $(this).attr("id");
		$("#myModalDelete").modal('show');
		});//penutup delete(show modal)

		//action delete
		$("#delete_button").click(function(){
            $.ajax({
              url:"/kota/delete/"+id_delete,
              beforeSend:function(){
                $("#delete_button").text('Deleting...');
              },
              success:function(){
                setTimeout(function(){
                  $("#myModalDelete").modal('hide');
                  $("#delete_button").text('OK');
                  $("#myTable").DataTable().ajax.reload();
                },50);
              }
            });
          });
		// aktiff
		var id_aktif;
		$(document).on('click','.status',function(){
			id_aktif = $(this).attr('id');
			$('.modal-title-aktif').text('Aktif Data');
			$('#tombol_aktif').text('Aktif Data');
			$('#myModalAktif').modal('show');
		});

		// action aktif
		$("#tombol_aktif").click(function(){
			$.ajax({
				url:"/kota/aktif/"+id_aktif,
				beforeSend:function(){
					$("#tombol_delete").text('Aktifin...');
				},
				success:function(){
					setTimeout(function(){
						$("#myModalAktif").modal('hide');
						$("#tombol_aktif").text('OK');
						$("#myTable").DataTable().ajax.reload();
					},500);
				}
			});
		});
	});
</script>
</html>