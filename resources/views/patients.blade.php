<x-base>
    <x-slot:vite>
        @vite(['resources/sass/table.scss', 'resources/sass/body.scss', 'resources/sass/nav.scss', 'resources/sass/pagination.scss'])
    </x-slot>
    <x-slot:title>
        Patients
    </x-slot>

    <table>
        <tr>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Email</th>
        </tr>
        @foreach ($patients as $patient)
            <tr>
                <td>{{ $patient->lastname }}</td>
                <td>{{ $patient->firstname }}</td>
                <td>{{ $patient->middlename }}</td>
                <td>{{ $patient->email }}</td>
            </tr>
        @endforeach
    </table>
    <div class="pagi">
        {{ $patients->links() }}
    </div>
</x-base>