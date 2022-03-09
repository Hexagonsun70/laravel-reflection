<x-layout>
    <section class="m-6">
        <div>
            <div class="flex items-center">
                        <span class="text-gray-800 text-xl p-2">
                            <i class="fas fa-angle-double-right"></i>
                            <a href="{{ route('logos.index') }}">Logos</a>
                        </span>
            </div>
            <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl p-6">
                <form class="text-yellow-400"
                      method="post"
                      action="{{ route('logos.store') }}"
                      enctype="multipart/form-data"
                >
                    @csrf
                    @method('POST')

                    @error('file_path')
                    <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                        {{ $message }}
                    </div>
                    @enderror

                    <label for="file_path" class="text-green-400 text-2xl">
                        Upload Logo:
                    </label>
                    <input type="file"
                           name="file_path"
                           accept="image/*"
                           class="p-4"
                    >
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white w-full text-center p-2 corner
                                   rounded-xl"
                    >
                        Upload image
                    </button>
                </form>
            </div>
        </div>

        <div class="flex items-center mt-6">
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
                @foreach ($errors->all() as $error)
                    @if(preg_match('/(file)/', $error))
                        @continue
                    @endif
                    <div class="bg-red-500 text-white p-2 flex justify-center items-center rounded mt-6">
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                    </div>
                @endforeach
            @endif

            <div class="py-6 font-bold text-yellow-400 mb-6">
                <form method="POST"
                      action="{{ route('companies.update', $company) }}"
                      class="flex flex-col"
                      novalidate
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
                                   imgSrc: '{{ old('logos') ?? $company->logos }}',
                                   companyImg: '{{ $company->logos }}',
                         }"
                    >
                        <div class="p-6">
                                <span class="text-green-500">
                                    Current Logo: <br>
                                    <p class="text-yellow-400" x-text="companyImg.substring(13)"></p>
                                </span>
                            <div class="h-full w-full flex justify-center items-center mt-2">
                                <img class="w-32 h-32 object-cover rounded" :src="companyImg">
                            </div>
                        </div>
                        <label for="company_id"
                               class="m-2 text-yellow-400"
                        >
                            Assign New Logo:
                        </label>
                        <x-dropdown.company-create :company='$company' :logos="$logos" />

                        <div class="h-full w-full flex justify-center items-center mt-2 mb-6">
                            <img class="w-32 h-32 object-cover rounded" :src="imgSrc">
                        </div>
{{--                        <div class="flex justify-center w-full p-4">--}}
{{--                            <x-modal.preview />--}}
{{--                        </div>--}}
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
    </section>
</x-layout>
