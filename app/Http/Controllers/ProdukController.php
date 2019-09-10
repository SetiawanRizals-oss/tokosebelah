<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB;
use App\produk;
use App\Kota;
use App\toko;
use App\jenis;
use DataTables;

class ProdukController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            return datatables()->of(produk::latest()->get())
            ->addColumn('detail',function($data){
                $button = '<button type="button" name="detail" id="'.$data->kodeProduk.'" class="detail btn btn-success btn-sm">Lihat</button>';
                return $button;
            })
            ->addColumn('edit',function($data){
                if ($data->isDelete==1) {
                    $button = '<button type="button" name="edit" id="'.$data->kodeProduk.'" class="edit btn btn-primary btn-sm">Ubah</button>';
                    return $button;
                }
            })
            ->addColumn('delete',function($data){
                if ($data->isDelete==1) {
                    $button = '<button type="button" name="delete" id="'.$data->kodeProduk.'" class="delete btn btn-danger btn-sm">Hapus</button>';
                    return $button;
                }
            })
            ->addColumn('aksi',function($data){
                if ($data->isDelete==1) {
                    $button = '<button type="button" id="'.$data->kodeProduk.'" class="aktif btn alert-success btn-sm">Aktif</button>';
                } else {
                    $button = '<button type="button" id="'.$data->kodeProduk.'" class="nonaktif btn alert-danger btn-sm">Nonaktif</button>'; //tombol detail
                    $button .= "&nbsp;&nbsp;"; //untuk spasi
                    $button .= '<button type="button" name="aktifkan" id="'.$data->kodeProduk.'" class="aktifkan btn btn-info btn-sm">Aktifkan</button>'; //tombol detail
                }

                return $button;
            })
            ->rawColumns(array("detail","edit","delete","aksi"))
            ->make(true);
    	}
        $jenisz = jenis::select('kodeJenis','namaJenis')->get(); //seperti select hobi from
        $kotaz = Kota::select('kodeKota','namaKota')->get(); //seperti select hobi from
        $tokoz = toko::select('kodeToko','namaToko')->get(); //seperti select hobi from
        return view::make('produk.index_produk')->with('jenisz',$jenisz)->with('kotaz',$kotaz)->with('tokoz',$tokoz);
        // return view('produk.index_produk',['jenisz'=>$jenisz],['kotaz'=>$kotaz],['tokoz'=>$tokoz]);
    }

    public function indexhu(Request $request)
    {

        if (request()->ajax()) {
             $query = DB::table('produk')
            ->join('jenis', 'jenis.kodeJenis', '=', 'produk.kodeJenis')
            ->join('Kota', 'Kota.kodeKota', '=', 'produk.kodeKota')
            ->join('toko', 'toko.kodeToko', '=', 'produk.kodeToko')
            ->select('produk.namaProduk', 'produk.hargaProduk', 'Kota.namaKota','jenis.namaJenis','toko.namaToko')
            ->get();
            
             return DataTables::of($query)->toJson();
        }

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

    public function detail(request $request,$kodeProduk)
    {
        if ($request->ajax()) {
            $data = produk::where('kodeProduk', '=',$kodeProduk)->get();
            return response()->json(['data'=>$data]);
        }
    }

    public function destroy($kodeProduk)
    {
        $now = \Carbon\Carbon::now();
        $isDelete = 0;
        $form_data = array(
            'isDelete' => $isDelete,
            'tanggalHapus' => $now
        );
        produk::where('kodeProduk','=',$kodeProduk)->update($form_data);

        return response()->json(['success'=>'Data is successfully update']);
    }

    public function aktif($kodeProduk)
    {
        $isDelete = 1;
        $form_data = array(
            'isDelete' => $isDelete
        );
        produk::where('kodeProduk','=', $kodeProduk)->update($form_data);

        return response()->json(['success'=>'Data is successfully update']);
    }
}
