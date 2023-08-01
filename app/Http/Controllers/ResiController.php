<?php

namespace App\Http\Controllers;


use App\Models\Resi;
// use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
// use RealRashid\SweetAlert\Facades\Alert;
// use Maatwebsite\Excel\Facades\Excel;
// use App\Exports\EmployeesExport;
// use PDF;


class ResiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pageTitle = 'Resi List';
        // confirmDelete();
        $resis = Resi::all();
        // $totalHargaSum = inreports::sum('total_harga');

        return view('admin.resi.index', [
            'pageTitle' => $pageTitle,
            'resis' => $resis
        ]);
    }

    public function create()
    {
        $pageTitle = 'Create Employee';

        // ELOQUENT
        $resis = Resi::all();

        return view('admin.resi.create', compact('pageTitle', 'resis'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            // 'firstName' => 'required',
            // 'lastName' => 'required',
            // 'email' => 'required|email',
            // 'age' => 'required|numeric',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get File
        $file = $request->file('fotoresi');

        if ($file != null) {
            $originalFilename = $file->getClientOriginalName();
            $encryptedFilename = $file->hashName();

            // Store File
            $file->store('public/files');
        }

        // ELOQUENT
        $employee = new Resi;
        $employee->namapt = $request->namapt;
        $employee->tanggal = now();
        $employee->harga = $request->harga;
        $employee->diskon = $request->diskon;
        // $employee->position_id = $request->position;

        if ($file != null) {
            $employee->original_filename = $originalFilename;
            $employee->encrypted_filename = $encryptedFilename;
        }

        $employee->save();

        // Alert::success('Added Successfully', 'Employee Data Added Successfully.');

        return redirect()->route('resi.index');
    }
    public function show(string $id)
    {
        // $pageTitle = 'Employee Detail';

        // // ELOQUENT
        // $employee = Resi::find($id);

        // return view('employee.show', compact('pageTitle', 'employee'));
    }


    public function edit(string $id)
    {
        // $pageTitle = 'Edit Employee';

        // // ELOQUENT
        // // $positions = Position::all();
        // $employee = Resi::find($id);

        // return view('employee.edit', compact('pageTitle', 'positions', 'employee'));
    }

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


        // $file = $request->file('cv');

        // if ($file != null) {
        //     $employee = Employee::find($id);
        //     $encryptedFilename = 'public/files/' . $employee->encrypted_filename;
        //     Storage::delete($encryptedFilename);
        // }
        // if ($file != null) {
        //     $originalFilename = $file->getClientOriginalName();
        //     $encryptedFilename = $file->hashName();

        //     // Store File
        //     $file->Store('public/files');
        // }

        // // UPDATE QUERY (ELOQUENT)
        // $employee = Employee::find($id);
        // $employee->firstname = $request->firstName;
        // $employee->lastname = $request->lastName;
        // $employee->email = $request->email;
        // $employee->age = $request->age;
        // $employee->position_id = $request->position;

        // if ($file != null) {
        //     $employee->original_filename = $originalFilename;
        //     $employee->encrypted_filename = $encryptedFilename;
        // }

        // $employee->save();
        // Alert::success('Changed Successfully', 'Employee Data Changed Successfully.');
        // return redirect()->route('employees.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Resi::find($id);

        if ($employee) {
            // Hapus file terkait Employee dari storage jika ada
            $encryptedFilename = 'public/files/' . $employee->encrypted_filename;
            Storage::delete($encryptedFilename);

            // Hapus entitas Employee dari database
            $employee->delete();
        }
        // Alert::success('Deleted Successfully', 'Employee Data Deleted Successfully.');
        return redirect()->route('employees.index');
    }


    public function downloadFile($employeeId)
    {
        $employee = Resi::find($employeeId);
        $encryptedFilename = 'public/files/' . $employee->encrypted_filename;
        $downloadFilename = Str::lower($employee->firstname . '_' . $employee->lastname . '_cv.pdf');

        if (Storage::exists($encryptedFilename)) {
            return Storage::download($encryptedFilename, $downloadFilename);
        }
    }


    public function deleteFile(Request $request, Resi $employee)
    {
        // Periksa apakah file ada sebelum menghapusnya
        if ($employee->original_filename) {
            // Hapus file dari storage
            Storage::disk('public')->delete('public/files/' . $employee->encrypted_filename);
            // Hapus informasi file dari model Employee
            $employee->original_filename = null;
            $employee->encrypted_filename = null;
            $employee->save();

            return redirect()->back()->with('success', 'File deleted successfully.');
        }

        return redirect()->back()->with('error', 'File not found.');
    }

    public function fullimage()
    {
        $pageTitle = 'Resi List';
        // confirmDelete();
        $resis = Resi::all();
        // $totalHargaSum = inreports::sum('total_harga');

        return view('admin.resi.index', [
            'pageTitle' => $pageTitle,
            'resis' => $resis
        ]);
    }

    public function exportExcel()
    {
        // return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    

    // public function getData(Request $request)
    // {
    //     $employees = Employee::with('position');

    //     if ($request->ajax()) {
    //         return datatables()->of($employees)
    //             ->addIndexColumn()
    //             ->addColumn('actions', function ($employee) {
    //                 return view('employee.actions', compact('employee'));
    //             })
    //             ->toJson();
    //     }
    // }
    // public function exportPdf()
    // {
    //     $employees = Employee::all();

    //     // $pdf = PDF::loadView('employee.export_pdf', compact('employees'));

    //     return $pdf->download('employees.pdf');
    // }
}
