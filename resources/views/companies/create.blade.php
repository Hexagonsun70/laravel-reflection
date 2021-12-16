<x-layout>
        <div>
            <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="/">Dashboard</a> /
                    <a href="{{ route('companies.index') }}">Companies</a>
                </span>
            </div>
            <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl text-green-500">
                <h1 class="text-4xl text-center pt-6">Add Company</h1>

                <div class="py-6 font-bold">

                    <form method="POST" action="/companies" class="flex flex-col text-yellow-400">
                        @csrf
                        <label for="name"
                               class="pb-2"
                        >
                            Company Name:

                        </label>
                        <input type="text"
                               name="name"
                               id="name"
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
                                   class="pl-2 bg-gray-500 text-white"
                                   required
                            >

                            <div class=" w-full pt-2"
                                 x-data="{ open: false, imgSrc: '' }">
                                <label for="logo"
                                       class="p-2"
                                >
                                    Logo File Path:
                                </label>
                                <input
                                    type="text"
                                    name="logo"
                                    id="logo"
                                    x-model="imgSrc"
                                    class="p-2 bg-gray-700 text-white w-full"
                                    required
                                >
                                <div class="flex justify-center w-full p-4">
                                    <x-modal.preview />
                                </div>
                            </div>

                        <label for="website"
                               class="py-2"
                        >
                            Website URL:
                        </label>
                        <input type="text"
                               name="website"
                               id="website"
                               class="pl-2 bg-gray-500 text-white"
                               required
                        >

                        <div class="flex justify-center">
                            <button class="px-6 py-2 mt-6 text-white bg-green-600 rounded-lg hover:bg-green-600">
                                Add Company
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-layout>
