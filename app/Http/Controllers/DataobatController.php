<?php

namespace App\Http\Controllers;

use App\Models\Listobat;
use App\Models\Satuan;
// use Dotenv\Validator;
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
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // ELOQUENT
        $employee = new Listobat();
        $employee->firstname = $request->firstName;
        $employee->lastname = $request->lastName;
        $employee->email = $request->email;
        $employee->age = $request->age;
        $employee->position_id = $request->position;
        $employee->save();

        return redirect()->route('employees.index');
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
        //
    }
}
