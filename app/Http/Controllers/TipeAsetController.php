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
        $data_tipe_aset = TipeAsetModel::all();
        // dd($data_tipe_aset);
        if($request->ajax()){
            return datatables()->of($data_tipe_aset)
            ->addColumn('action', function($data_tipe_aset){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data_tipe_aset->id_tipe_asset.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit_data">Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data_tipe_aset->id_tipe_asset.'" data-original-title="Hapus" class="hapus btn btn-danger btn-sm hapus_data">Hapus</a>' ;
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('tipe-aset.index');
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
       $cekTipeAset = TipeAsetModel::where('nama_tipe_asset', $request->nama_tipe_asset)->first();
       if(empty($cekTipeAset)){
           if(empty($request->id_tipe_asset)){
               $tipe_aset = new TipeAsetModel;
               $tipe_aset->nama_tipe_asset = $request->nama_tipe_asset;
               $tipe_aset->save();
               return response()->json([
                     'status' => 'success',
                     'message' => 'Data berhasil disimpan'
                ]);
           }else{
               $tipe_aset = TipeAsetModel::find($request->id_tipe_asset);
               $tipe_aset->nama_tipe_asset = $request->nama_tipe_asset;
               $tipe_aset->save();
               return response()->json([
                      'status' => 'success',
                      'message' => 'Data berhasil disimpan'
               ]);
           }
       }else{
           return response()->json([
                'status' => 'error',
                'message' => 'Data sudah ada'
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
        $data = TipeAsetModel::findOrFail($id);
        $data->nama_tipe_asset = $request->nama_tipe_asset;
        $data->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diubah'
        ]);
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

        return response()->json($data);
    }
}
