<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Patient;
use App\Observers\PatientObserver;
use App\Models\Appointment;
use App\Observers\AppointmentObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        Patient::observe(PatientObserver::class);
        Appointment::observe(AppointmentObserver::class);
    }
}
