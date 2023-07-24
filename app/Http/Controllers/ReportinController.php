<?php

namespace App\Http\Controllers;

use App\Models\inreports;
use App\Models\Listobat;
use App\Models\Satuan;
use Illuminate\Http\Request;

class ReportinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Employee List';
        // confirmDelete();
        $reportins = inreports::all();
        return view('admin.laporanmasuk.index', [
            'pageTitle' => $pageTitle,
            'reportins' => $reportins
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $pageTitle = 'Employee';
        $satuan = Satuan::all();
        return view('admin.laporanmasuk.tambahstock',compact('pageTitle','satuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $pageTitle = 'Employee';
        $request->validate([
            'kode_produk' => 'required|string',
            'jumlah_masuk' => 'required|integer|min:1',
        ]);

        $kode_produk = $request->input('kode_produk');
        $jumlah_masuk = $request->input('jumlah_masuk');
        $pemasok = $request->input('pemasok');
        $satuan_id = $request->input('satuan_id');
        // Cari data obat berdasarkan kode_produk
        $obat = Listobat::where('code', $kode_produk)->first();

        if (!$obat) {
            return redirect()->route('laporanmasuk.create')
                ->with('error', 'Produk dengan kode tersebut tidak ditemukan.');
        }

        // Tambahkan stok dengan jumlah masuk yang baru
        $obat->stock += $jumlah_masuk;
        $obat->save();

        inreports::create([
            'tanggal' => now(),
            'kode_produk' => $obat->code,
            'nama_produk' => $obat->name,
            'jumlah_masuk' => $jumlah_masuk,
            'satuan_id' => $satuan_id,
            'pemasok' => $pemasok, // Ganti dengan pemasok sesuai aplikasi Anda
            'harga_satuan' => $obat->harga, // Ganti dengan harga satuan sesuai aplikasi Anda
            'total_harga' => $obat->harga * $jumlah_masuk, // Ganti dengan total harga sesuai aplikasi Anda
        ]);
        $reportins = inreports::all();
        return view('admin.laporanmasuk.index', [
            'pageTitle' => $pageTitle,
            'reportins' => $reportins
        ]);
        // return redirect()->route('laporanmasuk.index',['reportins' => $reportins])
        //     ->with('success', 'Stok berhasil ditambahkan.');
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
}
