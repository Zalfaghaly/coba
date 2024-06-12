<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
class DatapembayarExport implements FromView, WithStyles, ShouldAutoSize
{
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        return view('pembayaran.export_excelPembayaran', [
            'bayar' => Pembayaran::where('statuse_id', '3')->get()
        ]);
    }
}
