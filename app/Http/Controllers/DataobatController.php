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

        $pageTitle = 'Create Pengguna';

        // ELOQUENT
        $satuan = Satuan::all();
        return view('admin.dataobat.create', compact('pageTitle', 'satuan'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $messages = [
        //     'required' => ':attribute harus diisi.',
        //     'unique' => ':attribute sudah digunakan.',
        //     'numeric' => 'Isi :attribute dengan angka.'
        // ];


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
