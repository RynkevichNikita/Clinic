<x-base>
    <x-slot:vite>
        @vite(['resources/sass/table.scss', 'resources/sass/body.scss', 'resources/sass/nav.scss', 'resources/sass/pagination.scss', 'resources/sass/appointment.scss'])
    </x-slot>
    <x-slot:title>
        Appointments
    </x-slot>

    <table>
        <tr>
            <th>Appointment Date</th>
            <th>Patient</th>
            <th>Doctor</th>
        </tr>
        @foreach ($appointments as $appointment)
            <tr>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->patient->lastname }} {{ $appointment->patient->firstname }}</td>
                <td>{{ $appointment->doctor->lastname }} {{ $appointment->doctor->firstname }}</td>
                <td class="edit"><a href="editAppointment?id={{ $appointment->id }}">Edit</a></td>
                <td class="delete">
                    <form action="appointments" method="POST">
                        @csrf
                        @method('DELETE')
                        <button value={{ $appointment->id }} name="id" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
        {{ $appointments->links() }}
</x-base>