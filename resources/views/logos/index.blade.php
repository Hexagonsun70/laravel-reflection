<x-layout>
    <section clASS="flex flex-wrap justify-center">
        <div class="m-8">
            <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="/">Dashboard</a> /
                    <a href="{{ route('companies.index') }}">Companies</a>
                </span>
            </div>
            <div class="bg-gray-800 mx-auto flex flex-col justify-center align-center px-9 h-auto  w-96 rounded-xl shadow-2xl  p-6">

                    <a href="/logos/create"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white w-full text-center p-2 corner rounded-xl"
                    >
                        Upload image
                    </a>

            @foreach($logos as $logo)
                <div class="w-64 bg-gray-800 text-yellow-400 h-auto rounded-xl m-4">
                    <div class="border-b border-white border-dashed">
                        <h1 class="p-2">
                            <span class="text-green-400 font-bold">Logo URL:</span> {{ substr($logo->file_path, 13) }}
                        </h1>
                    </div>
                    <div class="flex justify-center pt-4">
                        <img src="{{ $logo->file_path }}"
                             class="w-32 h-32 object-cover "
                        >
                    </div>
                    <div class="flex justify-center w-full p-4"
                         x-data="{ open: false,
                                       imgSrc: '{{ $logo->file_path }}',
                             }"
                    >
                        <x-modal.preview-c />
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </section>
</x-layout>
