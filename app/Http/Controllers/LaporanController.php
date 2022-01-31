<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tindakan;
use App\Exports\TindakanExport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use PDF;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('tindakan')
            ->join('table_tindakan_aset', 'tindakan.id', '=', 'table_tindakan_aset.id')
            ->select([
                'tindakan.id_tindakan',
                'tindakan.nama_tindakan',
                'tindakan.tanggal_tindakan',
                'tindakan.keterangan',
                'table_tindakan_aset.nama_aset',
                'table_tindakan_aset.tanggal_pembelian',
            ])
            ->orderBy('id_tindakan', 'desc')->get();
        if($request->ajax()){
            return datatables()->of($data)->make(true);
        }

        return view('tindakan.laporan');
    }

    public function export_pdf()
    {
        $user = \auth()->user()->name;
        // dd($user);
        $data = DB::table('tindakan')
            ->join('table_tindakan_aset', 'tindakan.id', '=', 'table_tindakan_aset.id')
            ->select([
                'tindakan.id_tindakan',
                'tindakan.nama_tindakan',
                'tindakan.tanggal_tindakan',
                'tindakan.keterangan',
                'table_tindakan_aset.nama_aset',
                'table_tindakan_aset.tanggal_pembelian',
            ])
            ->orderBy('id_tindakan', 'asc')->get();

        $pdf = PDF::loadview('tindakan.laporan_pdf', \compact('data', 'user'));
        $pdf->setPaper('folio', 'potrait');
        return $pdf->stream('laporan.pdf');
    }

   public function export_csv()
   {
    return Excel::download(new TindakanExport, 'tindakan.xlsx');
   }
}
