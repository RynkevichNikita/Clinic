<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Doctor;

class AppointmentController extends Controller
{
    public function show()
    {
        $appointments = Appointment::orderBy('appointmentDate')->with(['patient', 'doctor'])->paginate(30);
        return view('appointments', [
            'appointments' => $appointments,
        ]);
    }
    
    public function create()
    {
        $patients = Patient::orderBy('lastname')->get();
        $doctors = Doctor::orderBy('lastname')->get();
        return view('addAppointment', [
            'patients' => $patients,
            'doctors' => $doctors,
        ]);
    }
    
    public function store(StoreAppointmentRequest $request)
    {
        Appointment::create([
            'appointmentDate' => $request->appointmentDate,
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id
        ]);

        return redirect()->route('appointments');
    }

    public function delete(Request $request)
    {
        Appointment::destroy($request->id);

        return redirect()->route('appointments');
    }

    public function edit(Request $request)
    {
        $app = Appointment::find($request->id);
        $patients = Patient::orderBy('lastname')->get();
        $doctors = Doctor::orderBy('lastname')->get();

        return view('editAppointment', [
            'app' => $app,
            'patients' => $patients,
            'doctors' => $doctors,
        ]);
    }

    public function update(UpdateAppointmentRequest $request)
    {
        $app = Appointment::find($request->id);

        if(isset($request->appointmentDate)) {
            $app->appointmentDate = $request->appointmentDate;
        }

        if(isset($request->patient_id)) {
            $app->patient_id = $request->patient_id;
        }

        if(isset($request->doctor_id)) {
            $app->doctor_id = $request->doctor_id;
        }

        $app->save();

        return redirect()->route('appointments');
    }
}
