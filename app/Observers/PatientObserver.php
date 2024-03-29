<?php

namespace App\Observers;

use App\Models\Patient;
use Illuminate\Support\Facades\Mail;
use App\Mail\PatientCreated;

class PatientObserver
{
    public function created(Patient $patient): void
    {
        Mail::to($patient->email)->queue(new PatientCreated($patient));
    }
}
