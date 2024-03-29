<?php

namespace App\Observers;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentCreated;
use App\Mail\AppointmentUpdated;

class AppointmentObserver
{
    public function created(Appointment $appointment): void
    {
        Mail::to($appointment->patient->email)->queue(new AppointmentCreated($appointment));
    }

    public function updated(Appointment $appointment): void
    {
        Mail::to($appointment->patient->email)->queue(new AppointmentUpdated($appointment));
    }
}
