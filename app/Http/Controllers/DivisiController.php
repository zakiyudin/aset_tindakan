<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DivisiModel;
use DataTables;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $data_divisi = DivisiModel::all();
       if ($request->ajax()) {
           return datatables()->of($data_divisi)
           ->addColumn('action', function($data_divisi){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data_divisi->id_divisi.'" data-original-title="Edit" class="edit btn btn-warning btn-sm edit_data">Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$data_divisi->id_divisi.'" data-original-title="Hapus" class="hapus btn btn-danger btn-sm hapus_data">Hapus</a>' ;
                return $button;
    
           })
           ->rawColumns(['action'])
           ->addIndexColumn()
           ->make(true);
       }

       return view('divisi.index');
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
        $updateOrCreate = DivisiModel::updateOrCreate([
            'id_divisi' => $request->id_divisi
        ],
        [
            'nama_divisi' => $request->nama_divisi
        ]);

        return \response()->json($updateOrCreate);
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
        $data = DivisiModel::findOrFail($id);
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
        $data = DivisiModel::findOrFail($id);
        $data->delete();

        return response()->json($data, 200);
    }
}
