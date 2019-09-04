</!DOCTYPE html>
<html>
<head>
	<title>Data Jenis</title>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables.css">
<link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css">
	<style type="text/css">
table,th,td{
	
}

	</style>
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/datatables.min.js"></script>
	</head>

<body>
<div class="container">
	<h1><p style="text-align: center; font-style: times new roman;">Data Jenis</p></h1>
<table>
	<thead>

		<tr>
		<th><a href="/kota"><button  class="btn btn-primary">Kota</button></a></th>
		<th><a href="/jenis"><button class="btn btn-warning">Jenis</button></a></th>
		<th><a href="/index"><button class="btn btn-primary">Toko</button></a></th>
		<th><a href="/produk"><button class="btn btn-primary">Produk</button></a></th>
		  </tr>
	</thead>

</table>
<div class="container">
<span id="notif">

</span>


<button type="button" class="btn btn-primary" data-toggle="modal" id="modalAdd">
		Tambah
	</button>
<table class="table table-striped" id="bioTable" > 
	<thead style="text-align: center; color:yellow; background:grey;">
          <tr>
          <th>Kode Jenis </th>
          <th>Nama Jenis</th>
          <th>Promo Jenis</th>
          <th>Status</th>
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
          <form id="formJenis" ><!-- onsubmit="return validasi()"> -->
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
	    		<td><input type="text" id="kodeJenis" name="kodeJenis" placeholder="kode Jenis" required></td>
	    	</tr>

	       <tr>
	       	<td>Nama Jenis</td>
	     	<td>:</td>
	     	<td><input type="text" name="namaJenis" id="namaJenis" placeholder="">
	     	</td>
	       </tr>

				<tr>
	       	<td>Promo Jenis</td>
	     	<td>:</td>
	     	<td><input type="text" id="promoJenis" name="promoJenis" placeholder="Promo Jenis" required></td>
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


<!-- modal popup untuk detail -->
		<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Detail data</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <form >
	      	<div class="modal-body">
				<table class="table table-striped">
					<tr>
						<td>Kode Jenis</td>
						<td>:</td>
						<td id="kodeJenis_edit">
							
						</td>
					</tr>
					<tr>
						<td>Nama Jenis</td>
						<td>:</td>
						<td id="namaJenis_detail">
							
						</td>
					</tr>
					<tr>
						<td>Promo Jenis</td>
						<td>:</td>
						<td id="promoJenis_detail">
							
						</td>
					</tr>
					</table>
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
	      	</div>
		  </form>
	    </div>
	  </div>
	</div>




<!-- modal popup delete -->
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top: 100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<h4 class="modal-title" style="text-align: center;">Yakin mau diapus?</h4>
					</div>
					<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
						<button class="btn btn-danger" id="delete_button">Delete</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>


<!-- modal popup delete -->
		<div class="modal fade" id="modal_delete">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top: 100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<h4 class="modal-title" style="text-align: center;">Yakin mau diapus?</h4>
					</div>
					<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
						<button class="btn btn-danger" id="delete_button">Delete</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- modal popup Action -->
		<div class="modal fade" id="modal_action">
			<div class="modal-dialog">
				<div class="modal-content" style="margin-top: 100px;">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<h4 class="modal-title" style="text-align: center;"> Balikin Lagi neh?</h4>
					</div>
					<div class="modal-footer" style="margin: 0px; border-top: 0px; text-align: center;">
						<button class="btn btn-danger" id="button_action">Aktifkan Lagi Neh?</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</div>
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
 				url: "/jenis",
 			},
 			columns:[
 			     {
 					data : 'kodeJenis',
 					name : 'kodeJenis'
 				},
 				{
 					data : 'namaJenis',
 					name : 'namaJenis'
 				},
 				{
 					data : 'promoJenis',
 					name : 'promoJenis'
 					
 				},
 				{
 					data : 'action',
 					name : 'action',
 					orderable:false,
 				},
 				{
 					data : 'detail',
 					name : 'detail',
 					orderable:false,
 				},
 				{
 					data : 'edit',
 					name : 'edit',
 				     orderable:false,
 				},
 				{
 					data : 'delete',
 					name : 'delete',
                    orderable:false,
 				},
 				
 				
 			]
 		});










$(document).ready(function(){
$("#modalAdd").click(function(){
$(".modal-titleAdd").text('POP UP');
$("#tombol_action").text('Tambah Data');
$("#action").val('tambah');
$("#myModal").modal('show');
  });
});




$("#formJenis").on('submit',function(e){
	e.preventDefault();
var action = $("#action").val();
var kodeJenis =$("#kodeJenis").val();

//alert(kode_pelajaran);





//alert(action);

if (action=='tambah'){
  if (kodeJenis.length > 5 || kodeJenis.length < 5){
  	alert('Karakter harus 5 digit');
  }

  else{
$.ajax({
					url:"/jenis/add",
					method:"POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					dataType: "json",
					success:function(data){
						var html ='';
						$("#myModal").modal('hide');
						
						/*if (data.errors) {
							html = '<div class="alert alert-danger">';
							for(var count =0; count < data.errors.length; count++){
								html+='<p>'+data.errors[count]+'<p>';
							}

							html+='</div>';
						}*/
						

						if (data.success) {
							html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>WOI DATA nya Berhasil ditambah</strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

							//cara munculin display block
							 $("#formJenis")[0].reset();
							
						}
						$("#bioTable").DataTable().ajax.reload();

                        if (data.error) {
							html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error pak</strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

							//cara munculin display block
							
							 $("#formJenis")[0].reset();
							
						}
						 $("#bioTable").DataTable().ajax.reload();	

						$("#notif").html(html);
					}
				}); //penutup ajax
			
  }
/*alert("ajax untuk tambah")*/
} // penutup if tambah


//

if (action=='edit'){
	/*alert("ajax untuk edit")
	*/


}




});

$(document).ready(function(){

 $("#modalEdit").click(function(){
$(".modal-title").text('Edit Data');
$("#tombol_action").text('Edit data');
$("#action").val('edit');
$("#myModal").modal('show');
  });


$(document).on('click','.detail',function(){
			var id = $(this).attr('id');
			alert(id);
			$.ajax({
				url:"/jenis/detail/"+id,
				dataType: "json",
				success:function(html){
					$("#kodeJenis_edit").text(html.data[0].kodeJenis);
					$("#namaJenis_detail").text(html.data[0].namaJenis);
					$("#promoJenis_detail").text(html.data[0].promoJenis);
					$(".modal-title").text("detail Data");
					$("#tombol_action").text('Update Data');
					$("#detailModal").modal("show");
				}
			});
		});


});

$(document).on('click','.edit',function(){
			var id = $(this).attr('id');
			alert(id);
			$.ajax({
				url:"/jenis/edit/"+id,
				dataType: "json",
				success:function(html){
					$("#kodeJenis").val(html.data[0].kodeJenis);
					$("#namaJenis").val(html.data[0].namaJenis);
					$("#promoJenis").val(html.data[0].promoJenis);
					$("#yuuki").text("Edit Data");
					$("#action").val("Edit");
					$("#kode_pelajaran").prop('readonly',true); //untuk nambahin readonly
					$("#tombol_action").text('Update Data');
					$("#myModal").modal("show");
				}
			});
		});



// update
		$("#formJenis").on("submit", function(event){
			event.preventDefault();
			// if($("$action").val() == "add") {
				$.ajax({
					url:"/jenis/update",
					method:"POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					dataType: "json",
					success:function(data){
						var html ='';
						$("#myModal").modal('hide');
						
						/*if (data.errors) {
							html = '<div class="alert alert-danger">';
							for(var count =0; count < data.errors.length; count++){
								html+='<p>'+data.errors[count]+'<p>';
							}

							html+='</div>';
						}*/
						

						if (data.success) {
							html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Telah Di Update</strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

							//cara munculin display block
							 $("#formJenis")[0].reset();
							
						}
						$("#bioTable").DataTable().ajax.reload();

                        if (data.error) {
							html ='<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error pak</strong>'+data.error+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

							//cara munculin display block
							 $("#formJenis")[0].reset();
							
						}
							$("#bioTable").DataTable().ajax.reload();

						$("#notif").html(html);
					
					}
				});
			// }
		});


var id_delete;
		$(document).on('click','.delete',function(){

			lets = $(this).attr('id');
		alert(lets);
			$('#modal_delete').modal('show');
		});
  
		// action delete
		$("#delete_button").click(function(){
			$.ajax({
				url:"/jenis/destroy/"+lets,
				beforeSend:function(){
					$("#delete_button").text('Lagi di delete Boosss');
				},
				success:function(){
					setTimeout(function(){
						$("#modal_delete").modal('hide');
						$("#delete_button").text('OK');
						$("#bioTable").DataTable().ajax.reload();
					},500);
				}
			});
		});



var is_darkness;
		$(document).on('click','.darkness',function(){

			is_darkness = $(this).attr('id');
			alert(is_darkness);
			$('#modal_action').modal('show');
		});
  
		// action delete
		$("#button_action").click(function(){
			$.ajax({
				url:"/jenis/active/"+is_darkness,
				beforeSend:function(){
					$("button_action").text('sabar yak lagi di Aktfin nih..');
				},
				success:function(){
					setTimeout(function(){
						$("#modal_action").modal('hide');
						$("#button_action").text('OK');
						$("#bioTable").DataTable().ajax.reload();
					},500);
				}
			});
		});






</script>
</html>