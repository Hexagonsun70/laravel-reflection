<header class="p-6 bg-gray-600 w-screen h-24 flex justify-between mr-6 items-center text-green-400">
    <h1 class="text-4xl">
        SEO ADMIN PANEL
    </h1>

    @auth
        <button>Log Out</button>
        <a href="/">
            <h2 class="text-2xl mr-6">
                Welcome {{ auth()->user()->name }}!
            </h2>
        </a>
    @else
        <a href="/login">
            <h2 class="text-2xl mr-6">
                Log In
            </h2>
        </a>
    @endauth
</header>
