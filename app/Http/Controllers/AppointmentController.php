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
        $appointments = Appointment::orderBy('appointment_date')->with(['patient', 'doctor'])->paginate(30);
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
            'appointment_date' => $request->appointment_date,
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
        $appointment = Appointment::find($request->id);
        $patients = Patient::orderBy('lastname')->get();
        $doctors = Doctor::orderBy('lastname')->get();

        return view('editAppointment', [
            'appointment' => $appointment,
            'patients' => $patients,
            'doctors' => $doctors,
        ]);
    }

    public function update(UpdateAppointmentRequest $request)
    {
        $appointment = Appointment::find($request->id);

        if(isset($request->appointment_date)) {
            $appointment->appointment_date = $request->appointment_date;
        }

        if(isset($request->patient_id)) {
            $appointment->patient_id = $request->patient_id;
        }

        if(isset($request->doctor_id)) {
            $appointment->doctor_id = $request->doctor_id;
        }

        $appointment->save();

        return redirect()->route('appointments');
    }
}
