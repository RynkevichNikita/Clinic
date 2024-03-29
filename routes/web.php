<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;

Route::get('patients', [PatientController::class, 'show'])->name('patients');

Route::get('addPatient', [PatientController::class, 'create']);

Route::post('addPatient', [PatientController::class, 'store']);

Route::get('appointments', [AppointmentController::class, 'show'])->name('appointments');

Route::delete('appointments', [AppointmentController::class, 'delete']);

Route::patch('appointments', [AppointmentController::class, 'update']);

Route::get('addAppointment', [AppointmentController::class, 'create']);

Route::post('addAppointment', [AppointmentController::class, 'store']);

Route::get('editAppointment', [AppointmentController::class, 'edit']);
