<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
    $query = Employee::latest();

    if ($request->has('search')) {
        $query->where('nama_lengkap', 'like', '%' . $request->search . '%');
    }

    $employees = $query->paginate(5); 
    $employees->withQueryString();

    return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no_telpon' => 'required|string|max:20',
            'tanggal_kelahiran' => 'required|date',
            'alamat' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|string|max:50',
            'departemen_id' => 'nullable|exists:departments,id',
            'jabatan_id' => 'nullable|exists:positions,id',
        ]);

        Employee::create($request->all());
        return redirect()->route('employees.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'no_telpon' => 'required|string|max:20',
            'tanggal_kelahiran' => 'required|date',
            'alamat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'status' => 'required|in:aktif,nonaktif',
            'departemen_id' => 'nullable|exists:departments,id',
            'jabatan_id' => 'nullable|exists:positions,id',
        ]);
         $employee->update($request->all());
        return redirect()->route('employees.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Data berhasil dihapus.');
    }

}

abstract class Controller
{
    //
}
