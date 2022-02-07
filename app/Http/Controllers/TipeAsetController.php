<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipeAsetModel;

class TipeAsetController extends Controller
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
        $tipe_aset = TipeAsetModel::all();
        if($request->ajax()){
            return datatables()->of($tipe_aset)
            ->addColumn('action', function($tipe_aset){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$tipe_aset->id_tipe_asset.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit_data">Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$tipe_aset->id_tipe_asset.'" data-original-title="Hapus" class="hapus btn btn-danger btn-sm hapus_data">Hapus</a>' ;
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('tipe-aset.index');
        // 
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
        $code = TipeAsetModel::orderBy('id_tipe_asset', 'DESC')->first();
        $cekTipeAset = TipeAsetModel::where('nama_tipe_asset', $request->nama_tipe_asset)->first();
        if(empty($cekTipeAset)){
            if(empty($request->id_tipe_asset)){
                $tipe_aset = new TipeAsetModel;
                $tipe_aset->code_tipe_asset = "TA" . str_pad($code->id_tipe_asset + 1, 3, "0", STR_PAD_LEFT);
                $tipe_aset->nama_tipe_asset = $request->nama_tipe_asset;
                $tipe_aset->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data Tipe Asset Berhasil Ditambahkan'
                ]);
            }else{
                $tipe_aset = TipeAsetModel::find($request->id_tipe_asset);
                $tipe_aset->nama_tipe_asset = $request->nama_tipe_asset;
                $tipe_aset->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data Tipe Asset Berhasil Diubah'
                ]);
            }

        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Data Tipe Asset Sudah Ada'
            ]);
        }
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
        $data = TipeAsetModel::findOrFail($id);
        return response()->json($data);
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
        $data = TipeAsetModel::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Tipe Asset Berhasil Dihapus'
        ]);
    }
}
