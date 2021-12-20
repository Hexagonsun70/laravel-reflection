<x-layout>
    <section class="m-8">
        <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="/">Dashboard</a> /
                    <a href="{{ route('companies.index') }}">Companies</a>
                </span>
        </div>
        <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl">
            <h1 class="text-green-500 text-4xl text-center pt-6">
                Edit Company <br> <span class="text-yellow-400">{{ $company->name }}</span>
            </h1>

            @if ($errors->any())
                <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="py-6 font-bold text-yellow-400">
                <form method="POST"
                      action="{{ route('companies.update', $company) }}"
                      class="flex flex-col"
                >
                    @csrf
                    @method('PATCH')
                    <label for="name"
                           class="p-2 text-yellow-400"
                    >
                        Company Name:
                    </label>
                    <input type="text"
                           name="name"
                           id="name"
                           value="{{ old('name') ?? $company->name }}"
                           class="p-2 bg-gray-700 text-white"
                           required
                    >


                    <label for="email"
                           class="p-2"
                    >
                        Email:
                    </label>
                    <input type="email"
                           name="email"
                           id="email"
                           value="{{ old('email') ?? $company->email }}"
                           class="p-2 bg-gray-700 text-white"
                           required
                    >

                    <div class=" w-full pt-2"
                         x-data="{ open: false,
                                   imgSrc: '{{ $company->logos }}',
                                   companyImg: '{{ $company->logos }}',
                         }"
                    >
                        <label for="company_id"
                               class="m-2 text-yellow-400"
                        >
                            Assign New Logo:
                        </label>
                        <select name="logos"
                                id="logos"
                                class="bg-gray-700 p-2 my-2 w-full"
                                x-model="imgSrc"
                                required
                        >
                            <option value="{{ old('logos') ?? $company->logos }}"
                                    class="text-green-400"
                            >
                                {{ $company->logos }}
                            </option>
                            @foreach ($logos as $logo)
                                @if($company->logos == $logo->file_path)
                                    @continue
                                @endif
                                <option class="p-2 text-yellow-400"
                                        value="{{ $logo->file_path }}"
                                >
                                    {{ $logo->file_path }}
                                </option>
                            @endforeach
                        </select>
                        <div class="flex justify-center w-full p-4">
                            <x-modal.preview />
                        </div>
                    </div>

                    <label for="website"
                           class="pb-2 px-2"
                    >
                        Website URL:
                    </label>
                    <input type="text"
                           name="website"
                           id="website"
                           value="{{ old('website') ?? $company->website }}"
                           class="p-2 bg-gray-700 text-white w-full"
                           required
                    >

                    <button type="submit" class="px-6 py-2 mt-6 text-white bg-yellow-600 rounded-lg hover:bg-red-700">
                        Submit Edit
                    </button>
                </form>

            </div>
        </div>
        <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl m-8 p-6">
                <a class="bg-indigo-600 text-white w-full text-center p-2 corner rounded-xl hover:bg-indigo-700"
                   href="/logos"
                >
                    Upload Company Logo
                </a>
        </div>
    </section>
</x-layout>
