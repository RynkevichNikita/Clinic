<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\CorrectDate;

class UpdateAppointmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'appointmentDate' => ['nullable', 'date', new CorrectDate],
            'patient_id' => ['nullable', 'exists:patients,id'],
            'doctor_id' => ['nullable', 'exists:doctors,id'],
        ];
    }
}
