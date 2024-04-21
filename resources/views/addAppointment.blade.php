<x-base>
    <x-slot:vite>
        @vite(['resources/sass/body.scss', 'resources/sass/nav.scss', 'resources/sass/form.scss'])
    </x-slot>
    <x-slot:title>
        New appointment
    </x-slot>

    <form action="addAppointment" method="POST">
        @csrf
        <div>
            <label for="appointment_date">Choose an appointment date:</label>
            <input type="date" name="appointment_date" id="appointment_date">
        </div>
        <div>
            <label for="patient_id">Patient:</label>
            <select name="patient_id" id="patient_id">
                @foreach ($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->lastname }} {{ $patient->firstname }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="doctor_id">Doctor:</label>
            <select name="doctor_id" id="doctor_id">
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->lastname }} {{ $doctor->firstname }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Submit</button>
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