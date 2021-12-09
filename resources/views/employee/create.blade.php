<section>
    <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
        <h1 class="text-green-500 text-4xl text-center pt-6">Add Employee</h1>

        <div class="py-6 font-bold text-green-500">

            <form method="POST" action="/login" class="flex flex-col">
                @csrf
                <label for="email"
                       class="pb-2"
                >
                    Company ID:

                </label>

                <input type="comany_id"
                       name="company_id"
                       id="company_id"
                       value=" {{ old('email') }}"
                       class="pl-2 bg-gray-500 text-white"
                       required
                >

                <form method="POST" action="/login" class="flex flex-col">
                    @csrf
                    <label for="email"
                           class="pb-2"
                    >
                        Email:

                    </label>

                    <input type="email"
                           name="email"
                           id="email"
                           value=" {{ old('email') }}"
                           class="pl-2 bg-gray-500 text-white"
                           required
                    >

                <label for="password"
                       class="py-2"
                >
                    Password:

                </label>

                <input type="password"
                       name="password"
                       id="password"
                       class="pl-2 bg-gray-500 text-white"
                       required
                >

                <div class="flex justify-center">
                    <button class="px-6 py-2 mt-6 text-white bg-green-500 rounded-lg hover:bg-green-600">
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
