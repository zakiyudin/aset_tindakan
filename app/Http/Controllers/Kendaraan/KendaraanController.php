<?php

namespace App\Http\Controllers\Kendaraan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan\KendaraanModel;
use App\Models\Kendaraan\PemakaiKendaraanModel;
use App\Models\Kendaraan\AsuransiModel;
use Alert;
use DB;
use PDF;
use Carbon\Carbon;
use App\Exports\KendaraanExport;
use App\Imports\KendaraanImport;
use App\Imports\TestImport;
use Excel;

class KendaraanController extends Controller
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
        $pemakai_kendaraan = PemakaiKendaraanModel::all();
        $asuransi = AsuransiModel::all();
        // $kendaraan = DB::table('kendaraan')
        //     ->join('pemakai_kendaraan', 'kendaraan.pemakai_kendaraan_id', '=', 'pemakai_kendaraan.id_pemakai_kendaraan')
        //     ->join('asuransi', 'kendaraan.asuransi_id', '=', 'asuransi.id_asuransi')
        //     ->select('kendaraan.*', 'pemakai_kendaraan.nama_pemakai_kendaraan', 'asuransi.nama_asuransi')
        //     ->get();
        $kendaraan = KendaraanModel::with('pemakai_kendaraan', 'asuransi')->get();
;
        if($request->ajax()){
            return datatables()->of($kendaraan)
                ->addColumn('action', function($data){
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_kendaraan.'" data-original-title="Edit" class="edit btn btn-warning btn-sm kendaraan_data">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_kendaraan.'" data-original-title="Hapus" class="hapus btn btn-danger btn-sm kendaraan_data">Hapus</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->id_kendaraan.'" data-original-title="Detail" class="detail btn btn-info btn-sm kendaraan_data">Detail</a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('kendaraan.index', \compact('pemakai_kendaraan', 'asuransi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pemakai = PemakaiKendaraanModel::all();
        return view('kendaraan.create', ['pemakai' => $pemakai]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(empty($request->id_kendaraan));
        $nopol = KendaraanModel::where('nopol', $request->nopol)->first();

        if(empty($request->id_kendaraan)){
            $addData = new KendaraanModel;
            $addData->nopol = $request->nopol;
            $addData->jenis_kendaraan = $request->jenis_kendaraan;
            $addData->tahun_kendaraan = $request->tahun_kendaraan;
            $addData->warna_kendaraan = $request->warna_kendaraan;
            $addData->no_rangka = $request->no_rangka;
            $addData->no_mesin = $request->no_mesin;
            $addData->tonase = $request->tonase;
            $addData->atas_nama = $request->atas_nama;
            $addData->pemakai_kendaraan_id = $request->pemakai_kendaraan_id;
            $addData->polis_asuransi = $request->polis_asuransi;
            $addData->tgl_ex_asuransi = $request->tgl_ex_asuransi;
            $addData->asuransi_id = $request->asuransi_id;
            $addData->tgl_ex_stnk = $request->tgl_ex_stnk;
            $addData->tgl_ex_pajak_stnk = $request->tgl_ex_pajak_stnk;
            $addData->tgl_ex_kir = $request->tgl_ex_kir;
            $addData->keterangan = $request->keterangan;
            $addData->save();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil ditambahkan'
            ]);
        }else{
            $addData = KendaraanModel::find($request->id_kendaraan);
            $addData->nopol = $request->nopol;
            $addData->jenis_kendaraan = $request->jenis_kendaraan;
            $addData->tahun_kendaraan = $request->tahun_kendaraan;
            $addData->warna_kendaraan = $request->warna_kendaraan;
            $addData->no_rangka = $request->no_rangka;
            $addData->no_mesin = $request->no_mesin;
            $addData->tonase = $request->tonase;
            $addData->atas_nama = $request->atas_nama;
            $addData->pemakai_kendaraan_id = $request->pemakai_kendaraan_id;
            $addData->polis_asuransi = $request->polis_asuransi;
            $addData->tgl_ex_asuransi = $request->tgl_ex_asuransi;
            $addData->asuransi_id = $request->asuransi_id;
            $addData->tgl_ex_stnk = $request->tgl_ex_stnk;
            $addData->tgl_ex_pajak_stnk = $request->tgl_ex_pajak_stnk;
            $addData->tgl_ex_kir = $request->tgl_ex_kir;
            $addData->keterangan = $request->keterangan;
            $addData->save();

            return response()->json([
                'success' => true,
                'message' => 'Data berhasil diubah'
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
        $kendaraan = KendaraanModel::with('pemakai_kendaraan', 'asuransi')->findOrFail($id);
        // $kendaraan = KendaraanModel::find($id);
        // dd($kendaraan);
        return response()->json($kendaraan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = KendaraanModel::findOrFail($id);
        return response()->json($kendaraan);

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
        $kendaraan = KendaraanModel::findOrFail($id);
        $kendaraan->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menghapus data kendaraan'
        ]);
    }

    public function download_pdf()
    {
        $date_now = Carbon::now()->format('d-m-Y');
        $data = KendaraanModel::with('pemakai_kendaraan', 'asuransi')->get();
        $pdf = PDF::loadView('kendaraan.kendaraan-pdf', compact('data', 'date_now'))
                        ->setPaper('legal', 'landscape')
                        ->setWarnings(false)
                        ->save(public_path('kendaraan.pdf'));

        return $pdf->stream();
    }

    public function export_excel()
    {
        return Excel::download(new KendaraanExport, 'kendaraan.xlsx');
    }

    public function import_page()
    {
        return view('kendaraan.import');
    }

    public function import_excel(Request $request)
    {
        // dd($request->file("import_file"));

        $this->validate($request, [
            'import_file' => 'required|mimes:xls,xlsx'
        ]);
        try {
            //code...
            Excel::import(new KendaraanImport, $request->file("import_file"));
        } catch (NotTypeDetectedException $e) {
            // dd($e);
            return back()->with($e->getMessage()->withInput());

        }
        return redirect()->route('kendaraan.index')->with('success', 'Data berhasil diimport');
    }

    // method yang ubah data tgl dari 1970-01-01 menjadi null ketika setelah import
    public function delete_date()
    {
        $update = KendaraanModel::where('tgl_ex_asuransi', '=', '1970-01-01')
                                ->orWhere('tgl_ex_stnk', '=', '1970-01-01')
                                ->orWhere('tgl_ex_pajak_stnk', '=', '1970-01-01')
                                ->orWhere('tgl_ex_kir', '=', '1970-01-01')
                                ->get();
        foreach ($update as $key) {
            # code...
            $asuransi = $key->tgl_ex_asuransi == '1970-01-01';
            $stnk = $key->tgl_ex_stnk == '1970-01-01';
            $pajak = $key->tgl_ex_pajak_stnk == '1970-01-01';
            $kir = $key->tgl_ex_kir == '1970-01-01';

            if($asuransi){
                $key->update([
                    'tgl_ex_asuransi' => null
                ]);
            }

            if($stnk){
                $key->update([
                    'tgl_ex_stnk' => null
                ]);
            }

            if($pajak){
                $key->update([
                    'tgl_ex_pajak_stnk' => null
                ]);
            }

            if($kir){
                $key->update([
                    'tgl_ex_kir' => null
                ]);
            }
        }

        return back();
    }

    public function expired(Request $request)
    {
        $date_now = Carbon::now();
        $data = KendaraanModel::with('pemakai_kendaraan', 'asuransi')
                                ->where('tgl_ex_asuransi', '<=', $date_now)
                                ->get();
        if($request->ajax()){
            return datatables()->of($data)
                        ->addColumn('action', function($data){
                            $button = '<button type="button" name="edit" data-id="'.$data->id_kendaraan.'" class="tindak btn btn-outline-primary btn-sm">Tindak</button>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);

        }
        return view('kendaraan.expired');
    }

    public function expired_stnk(Request $request){
        $date_now = Carbon::now();
        $data = KendaraanModel::with('pemakai_kendaraan', 'asuransi')
                                ->where('tgl_ex_stnk', '<=', $date_now)
                                ->get();
        if($request->ajax()){
            return datatables()->of($data)
                        ->addColumn('action', function($data){
                            $button = '<button type="button" name="edit" data-id="'.$data->id_kendaraan.'" class="tindak btn btn-outline-primary btn-sm">Tindak</button>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);

        }
        return view('kendaraan.expired');
    }

    public function expired_pajak_stnk(Request $request)
    {
        $date_now = Carbon::now();
        $data = KendaraanModel::with('pemakai_kendaraan', 'asuransi')
                                ->where('tgl_ex_pajak_stnk', '<=', $date_now)
                                ->get();

        if($request->ajax()){
            return datatables()->of($data)
                        ->addColumn('action', function($data){
                            $button = '<button type="button" name="edit" data-id="'.$data->id_kendaraan.'" class="tindak btn btn-outline-primary btn-sm">Tindak</button>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
    }

    public function expired_kir(Request $request)
    {
        $date_now = Carbon::now();
        $data = KendaraanModel::with('pemakai_kendaraan', 'asuransi')
                                ->where('tgl_ex_kir', '<=', $date_now)
                                ->get();
        if($request->ajax()){
            return datatables()->of($data)
                        ->addColumn('action', function($data){
                            $button = '<button type="button" name="edit" data-id="'.$data->id_kendaraan.'" class="tindak btn btn-outline-primary btn-sm">Tindak</button>';
                            return $button;
                        })
                        ->rawColumns(['action'])
                        ->addIndexColumn()
                        ->make(true);
        }
        return view('kendaraan.expired');
    }
}
