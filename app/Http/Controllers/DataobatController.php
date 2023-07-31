<?php

namespace App\Http\Controllers;

use App\Models\Listobat;
use App\Models\Satuan;
use Dotenv\Validator;
use Illuminate\Http\Request;

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

        return view('admin.dataobat.create', compact('pageTitle'));

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
        $pageTitle = 'edit list obat';

        // ELOQUENT
        $satuan = Satuan::all();
        $listobat = Listobat::find($id);

        return view('admin.dataobat.edit', compact('pageTitle', 'satuan', 'listobat'));
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
        $listobat->firstname = $request->firstName;
        $listobat->lastname = $request->lastName;
        $listobat->email = $request->email;
        $listobat->age = $request->age;
        $listobat->position_id = $request->position;
        $listobat->save();

        return redirect()->route('listobats.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
