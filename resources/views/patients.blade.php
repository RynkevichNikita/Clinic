<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=s, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/table.scss', 'resources/sass/body.scss', 'resources/sass/nav.scss', 'resources/sass/pagination.scss'])
    <title>Patients</title>
</head>
<body>
    <header>
        <x-nav/>
    </header>
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
</body>
</html>