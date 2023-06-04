

            @include('header')
            <div>
                <br>
            </div>
    <h3>Bienvenido a Educame</h3>


    @vite('resources/js/app.js')

    {{-- <script type="module" src="{{ mix('/resources/js/app.js') }}"></script> --}}


    {{-- <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Cerrar sesión</button>
    </form> --}}

@include('footer')
