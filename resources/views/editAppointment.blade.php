<x-base>
    <x-slot:vite>
        @vite(['resources/sass/body.scss', 'resources/sass/nav.scss', 'resources/sass/form.scss', 'resources/sass/edit.scss'])
    </x-slot>
    <x-slot:title>
        Edit Appointment
    </x-slot>

    <form action="appointments" method="POST">
        @csrf
        @method('PATCH')
        <table>
            <tr>
                <th class="original">Date (original)</th>
                <th class="original">Patient (original)</th>
                <th class="original">Doctor (original)</th>
            </tr>
            <tr>
                <td class="original">{{ $appointment->appointment_date }}</td>
                <td class="original">{{ $appointment->patient->lastname }} {{ $appointment->patient->firstname }}</td>
                <td class="original">{{ $appointment->doctor->lastname }} {{ $appointment->doctor->firstname }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <th>Patient</th>
                <th>Doctor</th>
            </tr>
            <tr>
                <td>
                    <input type="date" name="appointment_date" id="appointment_date">
                </td>
                <td>
                    <select name="patient_id" id="patient_id">
                        <option value="{{ $appointment->patient->id }}" selected>{{ $appointment->patient->lastname }} {{ $appointment->patient->firstname }}</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->lastname }} {{ $patient->firstname }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="doctor_id" id="doctor_id">
                        <option value="{{ $appointment->doctor->id }}" selected>{{ $appointment->doctor->lastname }} {{ $appointment->doctor->firstname }}</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->lastname }} {{ $doctor->firstname }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <button name="id" id="id" value="{{ $appointment->id }}" type="submit">Submit</button>
    </form>
     
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-base>