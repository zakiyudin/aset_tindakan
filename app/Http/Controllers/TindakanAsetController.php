<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TindakanAsetModel;
use App\Models\TipeAsetModel;
use App\Models\DivisiModel;
use App\Imports\TindakanAsetImport;
use Illuminate\Support\Facades\Storage;
use DB;
use DataTables;
use Excel;
use Validator;

class TindakanAsetController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $divisi = DivisiModel::all();
        $tipe_aset = TipeAsetModel::all();
        $file_image = TindakanAsetModel::where('gambar_aset', '!=', '')->get();
        // $file_image->toArray();
        // dd($file_image[0]['gambar_aset']);

        $data = DB::table('table_tindakan_aset')
        ->join('tipe_asset', 'table_tindakan_aset.id_tipe_asset', '=', 'tipe_asset.id_tipe_asset')
        ->join('divisi', 'table_tindakan_aset.id_divisi', '=', 'divisi.id_divisi')
        ->select([
            'table_tindakan_aset.id',
            'table_tindakan_aset.nama_aset',
            'table_tindakan_aset.tanggal_pembelian',
            'tipe_asset.nama_tipe_asset as nama_tipe_asset', 
            'divisi.nama_divisi as nama_divisi'
            ])
            ->orderBy('id', 'desc')
            ->get();
        // dd($data);
        if($request->ajax()){
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit_data">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Deatil" class="detail btn btn-success btn-sm detail_data">Detail</a>' ;
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Hapus" class="hapus btn btn-danger btn-sm hapus_data">Hapus</a>' ;
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('tindakan-aset.index', \compact('divisi', 'tipe_aset', 'file_image'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $path = Storage::putFile('public/gambar_aset', $request->file('gambar_aset'));
        // dd($path);
        // $filename = $request->file('gambar_aset')->getClientOriginalName();

        // dd($request->hasFile('gambar_aset'));

            if(empty($request->id)){
                $tindakanAset                    = new TindakanAsetModel;
                $tindakanAset->nama_aset         = $request->nama_aset;
                $tindakanAset->tanggal_pembelian = $request->tanggal_pembelian;
                $tindakanAset->id_tipe_asset     = $request->id_tipe_asset;
                $tindakanAset->id_divisi         = $request->id_divisi;
                $tindakanAset->tanggal_expired   = $request->tanggal_expired;
                $tindakanAset->spesifikasi       = $request->spesifikasi;
                if($request->hasFile('gambar_aset')){
                    $filename = $request->file('gambar_aset')->getClientOriginalName();
                    $tindakanAset->gambar_aset = $request->file('gambar_aset')->storeAs('public/gambar_aset', $filename);
                }
                // $tindakanAset->gambar_aset       = Storage::putFile('public/gambar_aset', $request->file('gambar_aset'));
                $tindakanAset->save();
                return \response()->json(['success' => 'Berhasil Menambahkan Data']);
            }else{
                $tindakanAset                    = TindakanAsetModel::find($request->id);
                $tindakanAset->nama_aset         = $request->nama_aset;
                $tindakanAset->tanggal_pembelian = $request->tanggal_pembelian;
                $tindakanAset->id_tipe_asset     = $request->id_tipe_asset;
                $tindakanAset->id_divisi         = $request->id_divisi;
                $tindakanAset->tanggal_expired   = $request->tanggal_expired;
                $tindakanAset->spesifikasi       = $request->spesifikasi;
                $tindakanAset->save();
                return \response()->json(['success' => 'Berhasil Merubah Data']);
            }

        

        // $data = TindakanAsetModel::updateOrCreate([
        //     'id' => $request->id
        // ],
        // [
        //     'nama_aset' => $request->nama_aset,
        //     'tanggal_pembelian' => $request->tanggal_pembelian,
        //     'id_tipe_asset' => $request->id_tipe_asset,
        //     'id_divisi' => $request->id_divisi,
        //     'tanggal_expired' => $request->tanggal_expired,
        //     'spesifikasi' => $request->spesifikasi,
        // ]);

        // return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('table_tindakan_aset')
        ->join('tipe_asset', 'table_tindakan_aset.id_tipe_asset', '=', 'tipe_asset.id_tipe_asset')
        ->join('divisi', 'table_tindakan_aset.id_divisi', '=', 'divisi.id_divisi')
        ->select([
            'table_tindakan_aset.id',
            'table_tindakan_aset.nama_aset',
            'table_tindakan_aset.tanggal_pembelian',
            'tipe_asset.nama_tipe_asset as nama_tipe_asset', 
            'divisi.nama_divisi as nama_divisi',
            'table_tindakan_aset.tanggal_expired',
            'table_tindakan_aset.spesifikasi'
            ])
            ->where('id', $id)
            ->first();
        // $data = TindakanAsetModel::where('id', $id)->first();
        return response()->json($data, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $data = TindakanAsetModel::findOrFail($id);
        $data = TindakanAsetModel::where('id', $id)->first();
        // dd($data);
        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data = TindakanAsetModel::find($id);
        $data = TindakanAsetModel::where('id', $id)->delete();
        // $data = DB::table('table_tindakan_aset')->where('id', $id)->delete();

        return response()->json($data, 200);
    }

    public function importExcel(Request $request)
    {
        $this->validate($request, [
            'file_excel' => 'required|mimes:xls,xlsx',
        ]);

        // $file = $request->file('file_excel');
        // $nama_file = $file->hashName();
        // $path = $file->storeAs('public/excel/', $nama_file);

        
        // $file = $request->file('file_excel');
        // $nama_file = rand().$file->getClientOriginalName();
        // $file->move('file_excel', $nama_file);

        // Excel::import(new TindakanAsetImport, public_path('/file_excel/'.$nama_file));

        Excel::import(new TindakanAsetImport, $request->file('file_excel'));
        return 'sukses';


    }
}
