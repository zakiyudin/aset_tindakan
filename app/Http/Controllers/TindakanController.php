<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TindakanAsetModel;
use Carbon\Carbon;
use DB;
use App\Models\User;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::all();
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
        ->where('tanggal_expired', '<=' ,Carbon::now())->orderBy('id', 'desc')->get();
        // dd($data);
        if($request->ajax()){
            return datatables()->of($data)
                ->addColumn('action', function($data){
                    return $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id.'" data-original-title="Edit" class="edit btn btn-warning btn-sm tindak_data">Tindak</a>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('tindakan-aset.tindak.index', \compact('users'));
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
            'user_id' => $request->user_id,
            'tanggal_tindakan' => $request->tanggal_tindakan,
            'nama_tindakan' => $request->nama_tindakan,
        ]);

        return response()->json($data);
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
        $data = TindakanAsetModel::where('id', $id)->first();
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
        //
    }
}
