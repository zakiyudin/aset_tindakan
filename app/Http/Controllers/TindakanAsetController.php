<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TindakanAsetModel;
use App\Models\TipeAsetModel;
use App\Models\DivisiModel;
use DB;
use DataTables;

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

        $data = DB::table('table_tindakan_aset')
        ->join('tipe_asset', 'table_tindakan_aset.id_tipe_asset', '=', 'tipe_asset.id_tipe_asset')
        ->join('divisi', 'table_tindakan_aset.id_divisi', '=', 'divisi.id_divisi')
        ->select([
            'table_tindakan_aset.id',
            'table_tindakan_aset.nama_aset',
            'table_tindakan_aset.tanggal_tindakan',
            'table_tindakan_aset.nama_tindakan',
            'table_tindakan_aset.tanggal_pembelian',
            'tipe_asset.nama_tipe_asset as nama_tipe_asset', 
            'divisi.nama_divisi as nama_divisi'
            ])->get();
        // dd($data);
        if($request->ajax()){
            return DataTables::of($data)
                ->addColumn('action', function($data){
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit_data_tindakan">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Hapus" class="hapus btn btn-danger btn-sm hapus_data_tindakan">Hapus</a>' ;
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('tindakan-aset.index', \compact('divisi', 'tipe_aset'));
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
        $data = TindakanAsetModel::updateOrCreate([
            'id' => $request->id
        ],
        [
            'nama_aset' => $request->nama_aset,
            'tanggal_tindakan' => $request->tanggal_tindakan,
            'nama_tindakan' => $request->nama_tindakan,
            'tanggal_pembelian' => $request->tanggal_pembelian,
            'id_tipe_asset' => $request->id_tipe_asset,
            'id_divisi' => $request->id_divisi
        ]);

        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }
}
