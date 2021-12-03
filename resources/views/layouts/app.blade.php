<x-head/>
<body class="w-screen h-auto">
    <header class="w-screen">
        <nav class="w-screen w-max">
            <div class="flex justify-between w-screen p-4 border-b-2  border-black">

                <a class="" href="{{ url('/') }}">
                    {{ config('app.name', 'Admin Panel') }}
                </a>

                <button class="navbar-toggler"
                        type="button"
                        data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent"
                        aria-expanded="false"
                        aria-label="{{ __('Toggle navigation') }}"
                >

                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="">
                    <!-- Left Side Of Navbar -->
                    <ul class="">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="justify-between">
                        <x-authLinks />
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <main class="w-max py-4 flex justify-center">
        @yield('content')
    </main>

</body>
</html>
