<?php

namespace App\Http\Controllers;

use App\Models\Listobat;
use App\Models\Satuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataobatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Obat';

        // ELOQUENT
        $listobats = Listobat::all();
        return view('admin.dataobat.index', [
            'pageTitle' => $pageTitle,
            'listobats' => $listobats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Buat Obat';

        $satuan = Satuan::all();
        return view('admin.dataobat.create', compact('pageTitle', 'satuan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // var_dump($request->name);die();
        // $messages = [
        //     'required' => ':attribute harus diisi.',
        //     'unique' => ':attribute sudah digunakan.',
        //     'numeric' => 'Isi :attribute dengan angka.'
        // ];

        // $validator = Validator::make($request->all(), [
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'role_id' => 'required|exists:roles,id',
        // ], $messages);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        // Hash the password
        // $hashedPassword = bcrypt($validatedData['password']);
        // Hash the password
        // Pastikan kode untuk menyimpan data
        $pengguna = new Listobat();
        $pengguna->name = $request->name;
        $pengguna->code = $request->code;
        $pengguna->harga = $request->harga;
        $pengguna->stock = $request->stock;
        $pengguna->kategori = $request->kategori;
        $pengguna->satuan_id = $request->satuan_id;

        // return redirect()->route('dataobat.index');
        // Tambahkan pesan untuk pengecekan
        if ($pengguna->save()) {
        // Data berhasil disimpan
             return redirect()->route('dataobat.index')->with('success', 'Data pengguna berhasil disimpan.');
        } else {
           // Data gagal disimpan
            return redirect()->route('dataobat.create')->with('error', 'Gagal menyimpan data pengguna.');
        }

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
        Listobat::find($id)->delete();

        return redirect()->route('dataobat.index');
    }
}
