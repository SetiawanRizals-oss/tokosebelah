<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\toko;

class TokoController extends Controller
{
    public function index(){
      if (request()->ajax()) {
            return datatables()->of(toko::latest()->get())
            ->addColumn('status',function($data){
              if ($data->isDelete==0) {
                $button = '<button type="button" name="status" id="'.$data->kodeToko.'" class="btn alert-danger btn-sm">Non-Aktif</button>';
                $button.="&nbsp;&nbsp;&nbsp;";
                $button.='<button type="button" name="status" id="'.$data->kodeToko.'" class="aktif btn alert-primary btn-sm">Aktifkan</button>';
                return $button;
              }
              else{
                $button ='<button type="button" name="status" id="'.$data->kodeToko.'" class=" btn alert-info btn-sm">Aktif</button>';
                return $button;
              }
            })
            ->addColumn('detail',function($data){
                $button = '<button type="button" name="detail" id="'.$data->kodeToko.'" class="detail btn btn-success btn-sm">Lihat</button>';
                return $button;
            })
            ->addColumn('edit',function($data){
                $button = '<button type="button" name="edit" id="'.$data->kodeToko.'" class="edit btn btn-primary btn-sm">Ubah</button>';
                return $button;
            })
            ->addColumn('delete',function($data){
                $button = '<button type="button" name="delete" id="'.$data->kodeToko.'" class="delete btn btn-danger btn-sm">Hapus</button>';
                return $button;
            })
            
            ->rawColumns(array("status","detail","edit","delete"))
            ->make(true);
        }
     return view('toko.toko_index');
    }
   public function add(Request $request){
      $isDelete = 1;
      $form_data = array(
        'kodeToko' => $request->kodeToko,
        'namaToko' => $request->namaToko,
        'ratingToko' => $request->ratingToko,
        'isDelete' => $isDelete
      );

      $kodeto = toko::where('kodeToko','=', $request->kodeToko)->get();
      $count = count($kodeto);

      if ($count == 1) {
        return response()->json(['error'=>'Data sudah terpakai']);
      }else{
        toko::create($form_data);
        return response()->json(['success'=>'Data berhasil ditambah']);
      }
    }

    public function update(Request $request){
       $isDelete = 1;
        $form_data = array(
        'kodeToko' => $request->kodeToko,
        'namaToko' => $request->namaToko,
        'ratingToko'     => $request->ratingToko,
         'isDelete'     => $isDelete
      );

        $kodeto = toko::where('kodeToko','=', $request->kodeToko)->update($form_data);
     
        /*return response()->json(['success'=>'Berhasil']);*/
      }


    public function detail(Request $request,$id){
        if ($request->ajax()) {
            $data = toko::where('kodeToko','=', $request->id)->get();
            return response()->json(['data'=>$data]);
        }
    }

    public function edit(Request $request,$id){
        if ($request->ajax()) {
            $data = toko::where('kodeToko','=', $request->id)->get();
            return response()->json(['data'=>$data]);
        }
    }

      public function delete($kodeToko) 
      {
       $isDelete = 1;
        $form_data = array(
        'isDelete'=>0
      );

        $kodeto = toko::where('kodeToko',$kodeToko)->update($form_data);
     
        return response()->json(['success'=>'Data berhasil dihapus']);
      }

      public function aktif($kodeToko) 
      {
       $isDelete = 0;
        $form_data = array(
        'isDelete'=>1
      );

        $kodeto = toko::where('kodeToko',$kodeToko)->update($form_data);
     
        return response()->json(['success'=>'Data berhasil diaktifkan']);
      }
}
