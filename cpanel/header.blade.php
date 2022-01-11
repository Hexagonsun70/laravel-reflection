<header class="p-6 bg-gray-800 w-screen flex justify-between items-center text-green-500">

        @auth
        <div class="flex content-center">
        <a href="/">
            <h1 class="text-4xl">
                <b>CR</b><b class="text-yellow-500">U</b><b class="text-red-600">D</b>
                <b class="text-yellow-400">PANEL</b>
            </h1>
        </a>
        <div class="flex content-center h-full">
            <a href="/companies">
                <div class="bg-green-600 hover:bg-green-700 ml-2 text-white rounded w-auto
                flex items-center justify-center py-2 px-4 font-bold tracking-wide">
                    Companies
                </div>
            </a>
            <a href="/employees">
                <div class="bg-green-600 hover:bg-green-700 ml-2 text-white rounded w-auto
                flex items-center justify-center py-2 px-4 font-bold tracking-wide tracking-wider">
                    Employees
                </div>
            </a>
        </div>
        </div>

        <div class="flex">
            <a href="/logout" class=" flex items-center">
                <button class="px-4 py-2 text-1xl bg-green-600 hover:bg-green-700 text-white rounded-xl">
                    Log Out
                </button>
            </a>
            <a href="/">
                <h2 class="text-2xl p-2 mx-2 hidden sm:flex">
                    Welcome {{ auth()->user()->name }}!
                </h2>
            </a>

        </div>
    @else
        <div class="flex content-center">
            <a href="/">
                <h1 class="text-4xl">
                    <b>CR</b><b class="text-yellow-500">U</b><b class="text-red-600">D</b>
                    <b class="text-yellow-400">PANEL</b>
                </h1>
            </a>
        </div>

        <a href="/login">
            <h2 class="text-2xl mr-6">
                Log In
            </h2>

        </a>
    @endauth

</header>
