<div class="bg-gray-600 mx-auto flex flex-col justify-center align-center px-9 h-auto w-80 rounded-xl shadow-2xl">
    <h1 class="text-green-500 text-4xl text-center pt-6">Admin Login</h1>
    <div class="py-6 font-bold text-green-500">
        <form method="POST" action="/sessions" class="flex flex-col">

            <label for="email"
                   class="pb-2"
            >
                Email:

            </label>

            <input type="email"
                   name="email"
                   class="pl-2 bg-gray-400 text-white"
                   required
            >

            <label for="password"
                   class="py-2"
            >
                Password:

            </label>

            <input type="password"
                   name="password"
                   class="pl-2 bg-gray-400 text-white"
                   required
            >

            <div class="flex justify-center">
                <button class="p-2 mt-6 text-white bg-green-500 w-24 rounded-lg hover:bg-green-600">
                    Log In
                </button>
            </div>
        </form>
    </div>
</div>
