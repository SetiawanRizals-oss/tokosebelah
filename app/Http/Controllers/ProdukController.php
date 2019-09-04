<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\produk;
use App\Kota;
use App\toko;
use App\jenis;

class ProdukController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(produk::latest()->get())
            ->addColumn('detail',function($data){
                $button = '<button type="button" name="detail" id="'.$data->kodeProduk.'" class="detail btn btn-success btn-sm">Detail</button>';
                return $button;
            })
            ->addColumn('edit',function($data){
                $button = '<button type="button" name="edit" id="'.$data->kodeProduk.'" class="edit btn btn-primary btn-sm">Edit</button>';
                return $button;
            })
            ->addColumn('delete',function($data){
                $button = '<button type="button" name="delete" id="'.$data->kodeProduk.'" class="delete btn btn-danger btn-sm">Delete</button>';
                return $button;
            })
            ->addColumn('aksi',function($data){
                if ($data->isDelete==1) {
                    $button = '<button type="button" id="'.$data->kodeProduk.'" class="aktif btn btn btn-outline-success btn-sm">Aktif</button>';
                } else {
                    $button = '<button type="button" id="'.$data->kodeProduk.'" class="nonaktif btn btn-outline-warning btn-sm">Nonaktif</button>'; //tombol detail
                    $button .= "&nbsp;&nbsp;"; //untuk spasi
                    $button .= '<button type="button" name="aktifkan" id="'.$data->kodeProduk.'" class="aktifkan btn btn-info btn-sm">Aktifkan</button>'; //tombol detail
                }

                return $button;
            })
            ->rawColumns(array("detail","edit","delete","aksi"))
            ->make(true);
    	}
        $jenisz = jenis::select('kodeJenis')->get(); //seperti select hobi from
        $kotaz = Kota::select('kodeKota')->get(); //seperti select hobi from
        $tokoz = toko::select('kodeToko')->get(); //seperti select hobi from
        return view::make('produk.index_produk')->with('jenisz',$jenisz)->with('kotaz',$kotaz)->with('tokoz',$tokoz);
        // return view('produk.index_produk',['jenisz'=>$jenisz],['kotaz'=>$kotaz],['tokoz'=>$tokoz]);
    }

    public function add(Request $request){
        $isDelete = 1;
        $form_data = array(
            'kodeProduk' => $request->kodeProduk,
            'namaProduk' => $request->namaProduk,
            'hargaProduk' => $request->hargaProduk,
            'kodeKota' => $request->kota,
            'kodeJenis' => $request->jenis,
            'kodeToko' => $request->toko,
            'isDelete' => $isDelete
        );

        $kodeProd=produk::where('kodeProduk','=',$request->kodeProduk)->get();
        $count=count($kodeProd);
        if ($count==1) {
            return response()->json(['error'=>'Kode produk Sudah Ada.']);
        }
        produk::create($form_data);
        return response()->json(['success'=>'Data berhasil ditambah.']);
    }

    public function edit(request $request,$kodeProduk)
    {
        if ($request->ajax()) {
            $data = produk::where('kodeProduk', '=',$kodeProduk)->get();
            return response()->json(['data'=>$data]);
        }
    }

    public function update(Request $request)
    {
        $isDelete = 1;
        $form_data = array(
            'kodeProduk' => $request->kodeProduk,
            'namaProduk' => $request->namaProduk,
            'hargaProduk' => $request->hargaProduk,
            'kodeKota' => $request->kota,
            'kodeJenis' => $request->jenis,
            'kodeToko' => $request->toko,
            'isDelete' => $isDelete
        );

        produk::where('kodeProduk', '=',$request->kodeProduk)->update($form_data);
        return response()->json(['success'=>'Data is successfully update']);
    }
}
