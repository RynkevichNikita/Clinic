<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/body.scss', 'resources/sass/nav.scss', 'resources/sass/form.scss', 'resources/sass/edit.scss'])
    <title>Edit Appointment</title>
</head>
<body>
    <header>
        <x-nav/>
    </header>
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
                <td class="original">{{ $app->appointmentDate }}</td>
                <td class="original">{{ $app->patient->lastname }} {{ $app->patient->firstname }}</td>
                <td class="original">{{ $app->doctor->lastname }} {{ $app->doctor->firstname }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <th>Patient</th>
                <th>Doctor</th>
            </tr>
            <tr>
                <td>
                    <input type="date" name="appointmentDate" id="appointmentDate">
                </td>
                <td>
                    <select name="patient_id" id="patient_id">
                        <option value="{{ $app->patient->id }}" selected>{{ $app->patient->lastname }} {{ $app->patient->firstname }}</option>
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->lastname }} {{ $patient->firstname }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <select name="doctor_id" id="doctor_id">
                        <option value="{{ $app->doctor->id }}" selected>{{ $app->doctor->lastname }} {{ $app->doctor->firstname }}</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->lastname }} {{ $doctor->firstname }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>
        <button name="id" id="id" value="{{ $app->id }}" type="submit">Submit</button>
    </form>
</body>
</html>