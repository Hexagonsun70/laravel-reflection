<header class="p-6 bg-gray-800 w-screen flex justify-between items-center text-green-500">

    <h1 class="text-4xl">
        <b>S</b><b class="text-yellow-500">E</b><b class="text-red-600">O</b> <b>PANEL</b>
    </h1>

    @auth

        <div class="flex">
            <a href="/logout" class=" flex items-center">
                <button class="px-4 py-2 text-1xl bg-green-500 text-white rounded-xl">Log Out</button>
            </a>
            <a href="/">
                <h2 class="text-2xl p-2 mx-2 hidden sm:flex">
                    Welcome {{ auth()->user()->name }}!
                </h2>
            </a>

        </div>
    @else

        <a href="/login">
            <h2 class="text-2xl mr-6">
                Log In
            </h2>

        </a>
    @endauth

</header>
