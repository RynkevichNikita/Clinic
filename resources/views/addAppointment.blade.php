<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/body.scss', 'resources/sass/nav.scss', 'resources/sass/form.scss'])
    <title>New appointment</title>
</head>
<body>    
    <header>
        <x-nav/>
    </header>
    <form action="addAppointment" method="POST">
        @csrf
        <div>
            <label for="appointmentDate">Choose an appointment date:</label>
            <input type="date" name="appointmentDate" id="appointmentDate">
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
</body>
</html>