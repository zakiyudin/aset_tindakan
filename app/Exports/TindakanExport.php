<?php

namespace App\Exports;

use App\Models\TindakanModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Contracts\View\View;
use DB;


class TindakanExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    * @return \Illuminate\View\View
    */
    public function collection()
    {
        return DB::table('tindakan')
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
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nama Tindakan',
            'Tgl Tindakan',
            'Ket.',
            'Nama Aset',
            'Tgl Pembelian',
        ];
    }

    public function registerEvents(): array 
    {
        return [
            AfterSheet::class => function(AfterSheet $event){
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            }
        ];
    }
    
}
