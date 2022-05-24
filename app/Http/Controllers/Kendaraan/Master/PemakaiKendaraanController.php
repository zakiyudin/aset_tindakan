<?php

namespace App\Http\Controllers\Kendaraan\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan\PemakaiKendaraanModel;
use App\Models\DivisiModel;
use DB;
use Excel;
use App\Imports\PemakaiImport;
use App\Imports\ImportSheets;

class PemakaiKendaraanController extends Controller
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
        $data = PemakaiKendaraanModel::all();
        // dd($data->divisi->nama_divisi);
        // dd($data);

        if($request->ajax()){
            return datatables()->of($data)
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_pemakai_kendaraan.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit_data">Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data->id_pemakai_kendaraan.'" data-original-title="Hapus" class="hapus btn btn-danger btn-sm hapus_data">Hapus</a>' ;
                return $button;
            })
            ->rawColumns(['action', 'nama_divisi'])
            ->addIndexColumn()
            ->make(true);
        }

        return view('kendaraan.master.pemakai_kendaraan.index');
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
        $cek_pemakai = PemakaiKendaraanModel::where('nama_pemakai_kendaraan', $request->nama_pemakai_kendaraan)->first();
        if(empty($cek_pemakai)){
            if(empty($request->id_pemakai_kendaraan)){
                $pemakai = new PemakaiKendaraanModel;
                $pemakai->nama_pemakai_kendaraan = $request->nama_pemakai_kendaraan;
                $pemakai->save();
                return response()->json([
                    'status' => 'success',
                    'pesan' => 'Berhasil Menambahkan Data'
                ]);
            }else{
                $pemakai = PemakaiKendaraanModel::find($request->id_pemakai_kendaraan);
                $pemakai->nama_pemakai_kendaraan = $request->nama_pemakai_kendaraan;
                $pemakai->save();
                return response()->json([
                    'status' => 'success',
                    'pesan' => 'Berhasil Mengubah Data'
                ]);
            }
        }else{
            return response()->json([
                'status' => 'error',
                'pesan' => 'Nama Pemakai Kendaraan sudah ada'
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
        $edit_pemakai = PemakaiKendaraanModel::findOrFail($id);
        return response()->json($edit_pemakai);
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
        $hapus_pemakai = PemakaiKendaraanModel::findOrFail($id);
        $hapus_pemakai->delete();
        return response()->json([
            'status' => 'success',
            'pesan' => 'Berhasil Menghapus Data'
        ]);
    }

    public function import_page()
    {
        return view('kendaraan.master.pemakai_kendaraan.import');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'import_file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('import_file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_import', $nama_file);

        Excel::import(new PemakaiImport, public_path('/file_import/'.$nama_file));
        return back()->with(['success' => 'Berhasil Import Data']);
    }
}
