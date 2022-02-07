<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tindakan;
use App\Exports\TindakanExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;
use Carbon\Carbon;

class LaporanController extends Controller
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
        $date_now = Carbon::now();

        $data = DB::table('tindakan')
            ->join('table_tindakan_aset', 'tindakan.id', '=', 'table_tindakan_aset.id')
            ->join('users', 'tindakan.user_id', '=', 'users.id')
            ->select([
                'tindakan.id_tindakan',
                'tindakan.nama_tindakan',
                'tindakan.tanggal_tindakan',
                'tindakan.keterangan',
                'table_tindakan_aset.nama_aset',
                'table_tindakan_aset.tanggal_pembelian',
                'users.name'
            ])
            ->orderBy('id_tindakan', 'desc')->get();
        if($request->ajax()){
            return datatables()->of($data)->make(true);
        }

        return view('tindakan.laporan', \compact('date_now'));
    }

    public function export_pdf(Request $request)
    {
        // dd($request->tanggal_awal);
        $user = \auth()->user()->name;
        // dd($user);
        $data = DB::table('tindakan')
            ->join('table_tindakan_aset', 'tindakan.id', '=', 'table_tindakan_aset.id')
            ->join('users', 'tindakan.user_id', '=', 'users.id')
            ->select([
                'tindakan.id_tindakan',
                'tindakan.nama_tindakan',
                'tindakan.tanggal_tindakan',
                'tindakan.keterangan',
                'table_tindakan_aset.nama_aset',
                'table_tindakan_aset.tanggal_pembelian',
                'users.name'
            ])
            ->whereBetween('tanggal_tindakan', [$request->tanggal_awal, $request->tanggal_akhir])
            ->orderBy('id_tindakan', 'asc')->get();
            // dd($data[1]->nama_aset);
    

        $pdf = PDF::loadview('tindakan.laporan_pdf', \compact('data', 'user'));
        $pdf->setPaper('folio', 'potrait');
        return $pdf->stream('laporan.pdf');
    }

   public function export_csv()
   {
    return Excel::download(new TindakanExport, 'tindakan.xlsx');
   }
}
