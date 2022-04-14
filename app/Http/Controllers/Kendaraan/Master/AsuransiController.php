<?php

namespace App\Http\Controllers\Kendaraan\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan\AsuransiModel;

class AsuransiController extends Controller
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
        $data = AsuransiModel::all();
        if($request->ajax()){
            return datatables()->of($data)
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_asuransi.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit_data">Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id_asuransi.'" data-original-title="Hapus" class="hapus btn btn-danger btn-sm hapus_data">Hapus</a>' ;
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('kendaraan.master.asuransi.index');
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
        $get_id = AsuransiModel::orderBy('id_asuransi', 'DESC')->first();
        $cekAsuransi = AsuransiModel::where('nama_asuransi', $request->nama_asuransi)->first();
        if(empty($cekAsuransi)){
            if(empty($request->id_asuransi)){
                $asuransi = new AsuransiModel;
                $asuransi->nama_asuransi = $request->nama_asuransi;
                $asuransi->email_asuransi = $request->email_asuransi;
                $asuransi->no_telp_asuransi = $request->no_telp_asuransi;
                $asuransi->alamat_asuransi = $request->alamat_asuransi;
                $asuransi->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data Asuransi Berhasil Ditambahkan'
                ]);
            }else{
                $asuransi = AsuransiModel::find($request->id_asuransi);
                $asuransi->nama_asuransi = $request->nama_asuransi;
                $asuransi->save();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data Asuransi Berhasil Diubah'
                ]);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'Data Asuransi Sudah Ada'
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
        $edit_asuransi = AsuransiModel::findOrFail($id);
        return response()->json($edit_asuransi, 200);
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
        try {
            $update_asuransi = AsuransiModel::findOrFail($id);
            $update_asuransi->nama_asuransi = $request->nama_asuransi;
            $update_asuransi->email_asuransi = $request->email_asuransi;
            $update_asuransi->no_telp_asuransi = $request->no_telp_asuransi;
            $update_asuransi->alamat_asuransi = $request->alamat_asuransi;
            $update_asuransi->save();
            
            return redirect()->back('master/')->with('sukses', 'Data Berhasil Diubah');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = AsuransiModel::findOrFail($id);
        $hapus->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Data Asuransi Berhasil Dihapus'
        ]);
    }
}
