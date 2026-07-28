<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PatientController extends Controller
{
    // Show daftar pasien (Read)
    public function index()
    {
        $patients = Patient::latest()->get();
        return Inertia::render('Patients/Index', [
            'patients' => $patients
        ]);
    }

    // Show form tambah (Create)
    public function create()
    {
        return Inertia::render('Patients/Create');
    }

    // Show data pasien baru (Store)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:patients',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        Patient::create($request->all());

        return redirect()->route('patients.index');
    }

    // Show form edit (Edit)
    public function edit(Patient $patient)
    {
        return Inertia::render('Patients/Edit', [
            'patient' => $patient
        ]);
    }

    // Show perubahan data (Update)
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:20|unique:patients,nik,' . $patient->id,
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string',
        ]);

        $patient->update($request->all());

        return redirect()->route('patients.index');
    }

    // Menghapus data (Delete)
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patients.index');
    }
}