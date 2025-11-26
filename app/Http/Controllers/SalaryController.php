<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function index()
    {
        $salaries = Salary::with('employee')->latest()->paginate(5);
        return view('salaries.index', compact('salaries'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('salaries.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'bulan' => 'required',
            'gaji_pokok' => 'required|numeric',
        ]);

        // Hitung Total Gaji Otomatis
        $data = $request->all();
        $data['total_gaji'] = $request->gaji_pokok + $request->tunjangan - $request->potongan;

        Salary::create($data);

        return redirect()->route('salaries.index')->with('success', 'Data gaji berhasil disimpan.');
    }

    public function edit(Salary $salary)
    {
        $employees = Employee::all();
        return view('salaries.edit', compact('salary', 'employees'));
    }

    public function update(Request $request, Salary $salary)
    {
        $data = $request->all();
        // Hitung ulang saat update
        $data['total_gaji'] = $request->gaji_pokok + $request->tunjangan - $request->potongan;
        
        $salary->update($data);
        return redirect()->route('salaries.index')->with('success', 'Data gaji diperbarui.');
    }

    public function destroy(Salary $salary)
    {
        $salary->delete();
        return redirect()->route('salaries.index')->with('success', 'Data gaji dihapus.');
    }
}