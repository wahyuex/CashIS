<?php

namespace App\Http\Controllers;

use App\Models\Listobat;
use App\Models\Satuan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DataobatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'List Obat';
        $satuans = Satuan::all();
        // ELOQUENT
        $listobats = Listobat::all();
        return view('admin.dataobat.index',
        [
            'pageTitle' => $pageTitle,
            'listobats' => $listobats,
            'satuans' => $satuans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Buat Obat';


        $satuans = Satuan::all();
        return view('admin.dataobat.create', compact('pageTitle','satuans'));


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
        $pageTitle = 'edit list obat';

        // ELOQUENT
        $satuans = Satuan::all();
        $listobat = Listobat::find($id);

        return view('admin.dataobat.edit', compact('pageTitle', 'satuans', 'listobat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $messages = [
        //     'required' => ':Attribute harus diisi.',
        //     'email' => 'Isi :attribute dengan format yang benar',
        //     'numeric' => 'Isi :attribute dengan angka'
        // ];

        // $validator = Validator::make($request->all(), [
        //     'firstName' => 'required',
        //     'lastName' => 'required',
        //     'email' => 'required|email',
        //     'age' => 'required|numeric',
        // ], $messages);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // ELOQUENT
        $listobat = Listobat::find($id);
        $listobat->code = $request->code;
        $listobat->name = $request->name;
        $listobat->harga = $request->harga;
        $listobat->kategori = $request->kategori;
        $listobat->stock = $request->stock;
        $listobat->satuan_id = $request->satuan;
        $listobat->save();

        return redirect()->route('listobat');

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
