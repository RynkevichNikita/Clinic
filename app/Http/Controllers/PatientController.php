<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;

class PatientController extends Controller
{
    public function show()
    {
        $patients = Patient::orderBy('lastname')->paginate(30);
        return view('patients', [
            'patients' => $patients,
        ]);
    }
    
    public function create()
    {
        return view('addPatient');
    }
    
    public function store(StorePatientRequest $request)
    {
        Patient::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'email' => $request->email,
        ]);

        return redirect()->route('patients');
    }
}
