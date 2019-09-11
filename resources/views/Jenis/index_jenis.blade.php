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




<!-- 
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

</table> -->
<div class="container">
	  <center> <img src ="uit.jpg" height="80" width="280">
	  	<i><h4>Mulai Aja dulu</h4></i>
	  </center>
		<div style="text-align: right;">
            <button class="btn btn-primary" onclick="window.location.href='/'">Home</button>
			<button class="btn btn-primary" onclick="window.location.href='/settings'">Setting</button>

		</div>
<hr>
		<div class="btn-group btn-group-toggle" data-toggle="buttons">
		    <button type ="button"class="btn btn-primary btn-md ;" onclick="window.location.href='/kota'" >Kota
		    </button>
		    <button class="btn btn-warning btn-md active" onclick="window.location.href='/jenis'">Jenis
		    </button>	   
		    <button class="btn btn-primary btn-md" onclick="window.location.href='/toko'">Toko</button> 
		    <button class="btn btn-primary btn-md" onclick="window.location.href='/produk'">Produk</button>
		</div><br>

	<h5 style="text-align: center;">Data Jenis</h5>
<span id="notif">

</span>

<button type="button" class="btn btn-primary" data-toggle="modal" id="modalAdd">
		Tambah
	</button>
	<br>

<table class="table table-striped" id="bioTable" > 
	<thead style="text-align: center; color:white; background:forestgreen;">
          <tr>
          <th>Kode Jenis </th>
          <th>Nama Jenis</th>
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
          <form id="formJenis" >
        @csrf
			      <div class="modal-header">
			        <h5 class="modal-titleAdd" id="yuuki">Input Biodata</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			         </button>
			         </div>
			       
			      	<div class="modal-body">

			      		<input type="hidden" name="action" id="action">
						<table class="table table-striped">
			<tr>
	    		<td>Kode Jenis</td>
	    		<td>:</td>
	    		<td><input type="text" id="kodeJenis" name="kodeJenis" placeholder="kode Jenis"></td>
	    	</tr>

	       <tr>
	       	<td>Nama Jenis</td>
	     	<td>:</td>
	     	<td><input type="text" name="namaJenis" id="namaJenis" placeholder="nama Jenis">
	     	</td>
	       </tr>

				<tr>
	       	<td>Promo Jenis</td>
	     	<td>:</td>
	     	<td><input type="text" id="promoJenis" name="promoJenis" placeholder="Promo Jenis"></td>
	       </tr>
				
	      </table>
			      	</div>
			      	<div class="modal-footer">
			        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
			        	<button type="submit" id="tombol_action" class="btn btn-warning">Tambah Data</button>
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


$(document).ready(function(){
$("#modalAdd").click(function(){
$(".modal-titleAdd").text('tambah data');
$("#tombol_action").text('Tambah Data');
$("#action").val('tambah');
$("#formJenis")[0].reset();
$("#myModal").modal('show');
  });


$('#bioTable').DataTable({
 			processing : true,
 			serverside : true,
 			ajax:{
 				url: "/jenis_looks",
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










$("#formJenis").on('submit',function(e){
	e.preventDefault();

var action = $("#action").val();
var kodeJenis =$("#kodeJenis").val();
var namaJenis =$("#namaJenis").val();
var promoJenis=$("#promoJenis").val();

if (action=='tambah'){
 
	  if (kodeJenis.length > 5 || kodeJenis.length < 5)
	  {
	  	alert('Karakter harus 5 digit');
	  }
	  else if(kodeJenis=='')
	    {
			alert('Kode jenis tidak boleh kosong');
			
		}
          
      else if(namaJenis=='') 
        {
			alert('nama jenis tidak boleh kosong');
		
		}

       else if(promoJenis=='')
         {
			alert("promo jenis tidak boleh kosong");
		
			}



	   else
		  {
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
					
						if (data.success) {
							html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil ditambah </strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';

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
  } 
});




$(document).on('click','.detail',function(){
			var id = $(this).attr('id');
			/*alert(id);*/
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










$(document).on('click','.edit',function(ei){
	         ei.preventDefault();
			var id = $(this).attr('id');
			/*alert(id);*/
			$.ajax({
				url:"/jenis/edit/"+id,
				dataType: "json",
				success:function(html){
					$("#kodeJenis").val(html.data[0].kodeJenis);
					$("#namaJenis").val(html.data[0].namaJenis);
					$("#promoJenis").val(html.data[0].promoJenis);
					$("#yuuki").text("Edit Data");
					$("#action").val("Edit");
					$("#kodeJenis").attr('readonly',true); //untuk nambahin readonly
					$("#tombol_action").text('Update Data');
					$("#myModal").modal("show");
				}
			});
		});



// update
		$("#formJenis").on("submit", function(ei){
			ei.preventDefault();
			var action = $("#action").val(); //get value dari value dengan id action
			var kodeProduk = $("#kodeJenis").val(); //get value dari value dengan id action
			var namaJenis =$("#namaJenis").val();
            var promoJenis=$("#promoJenis").val();

            
			if (action == "Edit") {
				 if (kodeJenis.length > 5 || kodeJenis.length < 5)
	  {
	  	alert('Karakter harus 5 digit');
	  }
	   else if(kodeJenis=='')
	    {
			alert('Kode jenis tidak boleh kosong');
			
		}
          
      else if(namaJenis=='') 
        {
			alert('nama jenis tidak boleh kosong');
		
		}

       else if(promoJenis=='')
         {
			alert("promo jenis tidak boleh kosong");
		
			}


       else
		  {
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
					

						if (data.success) {
							html ='<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil di Update</strong>'+data.success+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
							$("#bioTable").DataTable().ajax.reload();
							$("#formJenis")[0].reset();
							$("#notif").html(html);
							
						}
						$("#bioTable").DataTable().ajax.reload();
					}

						  
				});
			 }
			}

		

});














var id_delete;
		$(document).on('click','.delete',function(){

			lets = $(this).attr('id');
		/*alert(lets);*/
			$('#modal_delete').modal('show');
		});
  
		// action delete
		$("#delete_button").click(function(){
			$.ajax({
				url:"/jenis/destroy/"+lets,
				beforeSend:function(){
					$("#delete_button").text('sedang di hapus');
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
			/*alert(is_darkness);*/
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


});




		


</script>
</html>