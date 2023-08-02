<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Pengguna';

        // ELOQUENT
        $users = Users::all();
        confirmDelete();
        return view('admin.pengguna.index', [
            'pageTitle' => $pageTitle,
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Pengguna';

        // ELOQUENT
        $roles = Role::all();
        return view('admin.pengguna.create', compact('pageTitle', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah digunakan.',
            'numeric' => 'Isi :attribute dengan angka.'
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required|exists:roles,id',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Hash the password
        // $hashedPassword = bcrypt($validatedData['password']);
        // Hash the password
        // Pastikan kode untuk menyimpan data
        $pengguna = new Users;
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt($request->password);
        $pengguna->role_id = $request->role_id;

        // Tambahkan pesan untuk pengecekan
        if ($pengguna->save()) {
            // Data berhasil disimpan
            Alert::success('Added Successfully', 'Pengguna Data Added Successfully.');
            return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil disimpan.');
        } else {
            // Data gagal disimpan
            return redirect()->route('admin.pengguna.index')->with('error', 'Gagal menyimpan data pengguna.');
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
        $pageTitle = 'Edit Pengguna';

        $roles = Role::all();
        $users = Users::find($id);


        return view('admin.pengguna.edit', compact('pageTitle', 'users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt($request->password);
        $pengguna->role_id = $request->role;

        // Tambahkan pesan untuk pengecekan
        if ($pengguna->save()) {
            Alert::success('Changed Successfully', 'Pengguna Data Changed Successfully.');
            // Data berhasil disimpan
            return redirect()->route('pengguna.index')->with('success', 'Data pengguna berhasil disimpan.');
        } else {
            // Data gagal disimpan
            return redirect()->route('pengguna.index')->with('error', 'Gagal menyimpan data pengguna.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Users::find($id)->delete();
        Alert::success('Deleted Successfully', 'Pengguna Data Deleted Successfully.');
        return redirect()->route('pengguna.index');
    }
}
