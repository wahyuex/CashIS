<?php

namespace App\Exports;

// use App\Models\Employee;
use App\Models\inreports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class inreportsExport implements FromView, WithStyles, ShouldAutoSize
{
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }

    public function view(): View
    {
        return view('admin.laporanmasuk.export_excel', [
            'reportins' => inreports::all(),
            'totalHargaSum' => inreports::sum('total_harga')
        ]);
    }
}