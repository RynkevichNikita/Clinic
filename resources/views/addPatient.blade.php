<x-base>
    <x-slot:vite>
        @vite(['resources/sass/body.scss', 'resources/sass/nav.scss', 'resources/sass/form.scss'])
    </x-slot>
    <x-slot:title>
        New patient
    </x-slot>

    <form action="addPatient" method="POST">
        @csrf
        <div>
            <label for="lastname">Last name:</label>
            <input type="text" name="lastname" id="lastname">
        </div>
        <div>
            <label for="firstname">First name:</label>
            <input type="text" name="firstname" id="firstname">
        </div>
        <div>
            <label for="middlename">Middle name:</label>
            <input type="text" name="middlename" id="middlename">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
        </div>
        <button type="submit">Sumbit</button>
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