<x-layout>
    <div>
        <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="/">Dashboard</a> /
                    <a href="{{ route('companies.index') }}">Companies</a>
                </span>
        </div>
        <div id="company-card"
             class=" bg-gray-800 text-green-400 p-4 rounded-xl bg-auto w-96 flex items-center leading-none">
            <div id="card-content" class="flex items-center">

                <img src="{{ $company->logo }}"
                     alt="{{ $company->name }} logo"
                     class="h-40 w-40 pr-4 rounded"
                >
                <div id="card-details" class="flex flex-col justify-center">
                    <h1 class="font-bold tracking-wide break-normal text-yellow-400 uppercase leading-none pb-4">
                        {{ $company->name }} <br>
                    </h1>
                    <h2 class="font-bold tracking-wider text-green-400 uppercase">
                        website:
                    </h2>
                    <span class="pb-4">{{ $company->website }}</span>
                    <h2 class="font-bold tracking-wider text-green-400 uppercase">
                        contact details:
                    </h2>
                    <span class="pb-4"> {{ $company->email }}</span>
                    <div class="w-full flex justify-center">
                        {{--                                <?php $replaceArr = [',',' '] ?>--}}
                        {{--                                <a href="/companies/{{  strtolower(str_replace($replaceArr, '-', $companies->name))  }}">--}}
                        {{--                                    <button class="bg-green-500 rounded text-white px-4 py-2 m-2">Employees</button>--}}
                        {{--                                </a>--}}
                        <a href="/companies/{{ $company->id  }}">
                            <button class="bg-green-500 rounded text-white px-4 py-2 m-2">Employees</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-layout>
