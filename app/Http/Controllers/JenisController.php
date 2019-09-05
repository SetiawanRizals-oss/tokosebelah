<?php

namespace App\Http\Controllers;
use\App\jenis;
use Illuminate\Http\Request;

class JenisController extends Controller
{
      public function index()
    {
		if(request()->ajax()){
			return datatables()->of(jenis::latest()->get())
			//latestnya diganti where('is_delete','=',1)->get())
			
             ->addColumn('action',function($data){
			if($data->isDelete==0){
				$button = '<button type="button"
			    name="action" id="'.$data->kodeJenis.'"
			    class="btn alert-danger
			    btn-sm">Non Aktif</button>';
			    $button .="&nbsp;&nbsp;&nbsp;" ;
			    $button .= '<button type="button"
			    name="action" id="'.$data->kodeJenis.'"
			    class="darkness btn alert-primary
			    btn-sm">Aktifkan</button>';
			    return $button;
			}
			else{
				 $button = '<button type="button"
			    name="action" id="'.$data->kodeJenis.'"
			    class="btn alert-info
			    btn-sm">Aktif</button>';
			    return $button;
			}

				
           })
			
            ->addColumn('detail',function($data){
			$button = '<button type="button"
			name="detail" id="'.$data->kodeJenis.'"
			class="detail btn btn-success
			btn-sm">Lihat</button>';
			return $button;
			})




			->addColumn('edit',function($data){
				
         
				$button ='<button type="button"
				name="edit" id="' .$data->kodeJenis.'"
				class="edit btn btn-primary
				btn-sm">Ubah</button>';
			return $button;
			})
			

			->addColumn('delete',function($data){
			$button = '<button type="button"
			name="delete" id="'.$data->kodeJenis.'"
			class="delete btn btn-danger
			btn-sm">Hapus</button>';
			return $button;
			})

          
        
			
     


			 
        
			->rawColumns(array("action","detail","edit","delete"))
			->make(true);
			return view('Jenis.index_jenis');
			
			
			}

    }


public function add(Request $request){ //post udah pasti  $request kalo ngelempar data pakai form berarti pake $request
    $isDelete = 1;



    $form_data =array(
          'kodeJenis'=>$request->kodeJenis,
          'namaJenis'=>$request->namaJenis,
          'promoJenis'=>$request->promoJenis,
          'isDelete'=>$isDelete
          
    );
    $kodeYUI = jenis::where('kodeJenis', '=' , $request->kodeJenis)->get(); //nyari data
    $count=count($kodeYUI);

    if($count==1){
      return response()->json(['error'=>' Data telah ada']);
    }
    else{
     jenis::create($form_data);
     return response()->json(['success'=>'Data Berhasil Ditambah']);
    }

    /*var_dump($kodePel->kode_pelajaran);*/

     

    }



 public function detail(Request $request, $kodeJenis)
    {
        if($request->ajax()){
			$data =jenis::where('kodeJenis', '=', $kodeJenis)->get();
			return response()->json(['data'=>$data]);
		} //elorquen
    }


public function edit(Request $request, $kodeJenis)
    {
        if($request->ajax()){
			$data =jenis::where('kodeJenis', '=', $kodeJenis)->get();
			return response()->json(['data'=>$data]);
		} //elorquen
    }

public function update(Request $request)
  {
  	 $isDelete = 1;
   $form_data =array(
          
          'kodeJenis'=>$request->kodeJenis,
          'namaJenis'=>$request->namaJenis,
          'promoJenis'=>$request->promoJenis
       
          
    );
   
    $kodeJen = jenis::where('kodeJenis', '=' , $request->kodeJenis)->update($form_data); //nyari data
        return response()->json(['success'=>' Data Berhasil Ditambah']);
 }


 public function destroy($kodeJenis)
      {
       
         $isDelete = 1;	
         $form_data =array(
          'isDelete'=>0
         );
   
    $kodeJen = jenis::where('kodeJenis',$kodeJenis)->update($form_data); //nyari data
        return response()->json(['success'=>'Data Berhasil Di Non Aktifkan']);
 }


public function dark($kodeJenis)
      {
       
         $isDelete = 0;	
         $form_data =array(
          'isDelete'=>1
         );
   
    $kodeJen = jenis::where('kodeJenis',$kodeJenis)->update($form_data); //nyari data
        return response()->json(['success'=>' Nah dah balik tuh']);
 }



}
