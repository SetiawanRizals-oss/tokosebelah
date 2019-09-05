<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;

class KotaController extends Controller
{
    public function index(){
    	if (request()->ajax()) {
            return datatables()->of(Kota::latest()->get())

           ->addColumn('action',function($data){
				if ($data->isDelete==0){
				$button= '<button type="button" name="satatus" id="'.$data->kodeKota.'" class="btn alert-success btn-sm">Non Aktifkan</button>';
				$button .="&nbsp;&nbsp;";
				$button	.= '<button type="button" name="satatus" id="'.$data->kodeKota.'" class="status btn btn-primary btn-sm">Aktifkan</button>';
				return $button;

				}else{
				$button= '<button type="button" name="satatus" id="'.$data->kodeKota.'" class="btn  alert-danger btn-sm" colspan="2">Aktif</button>';
					return $button;
				}
			})

            ->addColumn('edit',function($data){
                $button = '<button type="button" name="edit" id="'.$data->kodeKota.'" class="edit btn btn-primary btn-sm">Ubah</button>';
                return $button;
            })
            ->addColumn('delete',function($data){
                $button = '<button type="button" name="delete" id="'.$data->kodeKota.'" class="delete btn btn-danger btn-sm">Hapus</button>';
                return $button;
            })
            ->addColumn('detail',function($data){
                $button = '<button type="button" name="detail" id="'.$data->kodeKota.'" class="detail btn btn-success btn-sm">Lihat</button>';
                return $button;
            })
            ->rawColumns(array("action","edit","delete","detail"))
            ->make(true);
        }
    	return view('kota.index_kota');
    }

    //add
    public function add(Request $request){
    	$isDelete = 1;
    	$form_data = array(
    		'kodeKota' 	=> $request->kodeKota,
    		'namaKota' 	=> $request->namaKota,
    		'luasKota'	=> $request->luasKota,
    		'isDelete'	=> $isDelete
    	);

    	$kodekota = Kota::where('kodeKota','=', $request->kodeKota)->get();
    	$count = count($kodekota);

    	if ($count == 1) {
    		return response()->json(['error'=>'Kode Kota sudah terpakai']);
    	}else{
    		Kota::create($form_data);
    		return response()->json(['success'=>'Data berhasil ditambah.']);
    	}
    }
    public function edit(Request $request,$id){
		if ($request->ajax()) {
			$data = Kota::where('kodeKota','=', $request->id)->get();
			return response()->json(['data'=>$data]);
			}
	}
	public function update(Request $request)
     {
       	$isDelete = 1;
        $form_data 	= array(
        'kodeKota' 	=> $request->kodeKota,
        'namaKota' 	=> $request->namaKota,
        'luasKota'  => $request->luasKota,
         'isDelete' => $isDelete
      );
        $kodeto = Kota::where('kodeKota','=', $request->kodeKota)->update($form_data);
        return response()->json(['success'=>'Data berhasil diupdate']);
      }
	public function detail(Request $request,$id){
        if ($request->ajax()) {
            $data = Kota::where('kodeKota','=', $request->id)->get();
            return response()->json(['data'=>$data]);
        }
    }
    public function delete($kodeKota) 
      {
       $isDelete = 1;
        $form_data = array(
        'isDelete'=>0
      );
        $kodeto = Kota::where('kodeKota',$kodeKota)->update($form_data);
        return response()->json(['success'=>'Data berhasil didelete']);
     }
    public function aktif($kodeKota) 
      {
       $isDelete = 0;
        $form_data = array(
        'isDelete'=>1
      );

        $kodeto = Kota::where('kodeKota',$kodeKota)->update($form_data);
     
        return response()->json(['success'=>'Data berhasil diaktifkan']);
      }
}

