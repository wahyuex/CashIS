<?php

namespace App\Http\Controllers;

use App\Exports\outreportsExport;
use App\Models\outreports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class ReportoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Employee List';
        // confirmDelete();
        $reportouts = outreports::all();
        return view('admin.laporankeluar.index', [
            'pageTitle' => $pageTitle,
            'reportouts' => $reportouts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function exportExcel()
    {
        return Excel::download(new outreportsExport, 'Laporan Keluar.xlsx');
    }
    public function exportPdf()
    {
        $reportouts = outreports::all();
        $totalHargaSum = outreports::sum('total_harga');
        $pdf = PDF::loadView('admin.laporankeluar.export_pdf', compact('reportouts','totalHargaSum'));

        return $pdf->download('inreports.pdf');
    }
}
