<x-layout>
    <section class="m-8">
        <div class="flex items-center">
                <span class="text-gray-800 text-xl p-2"><i class="fas fa-angle-double-left"></i>
                    <a href="/">Dashboard</a> /
                    <a href="{{ route('companies.index') }}">Companies</a>
                </span>
        </div>
        <div id="company-card"
             class=" bg-gray-800 text-green-500 p-4 rounded-xl bg-auto w-96 flex flex-col items-center leading-none">
            <div id="card-content" class="flex flex-col items-center justify-center">


                <div id="card-details" class="flex flex-col justify-center ">
                    <h1 class="font-bold tracking-wide break-normal text-yellow-400 uppercase leading-none pb-4 text-2xl text-center">
                        {{ $company->name }} <br>
                    </h1>
                    <h2 class="font-bold tracking-wider text-green-400  text-xl">
                        Website:
                    </h2>
                    <span class="pb-4 text-yellow-400 text-xl">{{ $company->website }}</span>
                    <h2 class="font-bold tracking-wider text-green-400 text-xl">
                        Contact Details:
                    </h2>
                    <span class="pb-4 text-yellow-400 text-xl"> {{ $company->email }}</span>
                    <div class="w-full flex justify-center pb-4">
                        {{--                                <?php $replaceArr = [',',' '] ?>--}}
                        {{--                                <a href="/companies/{{  strtolower(str_replace($replaceArr, '-', $companies->name))  }}">--}}
                        {{--                                    <button class="bg-green-500 rounded text-white px-4 py-2 m-2">Employees</button>--}}
                        {{--                                </a>--}}
                        <a href="/companies/{{ $company->id  }}">
                            <button class="bg-green-500 rounded text-white px-4 py-2 m-2">Employees</button>
                        </a>
                    </div>
                    <img src="{{ $company->logos }}"
                         alt="{{ $company->name }} logo"
                         class="h-80 w-full  rounded object-cover"
                    >

                </div>
            </div>
        </div>
    </section>
</x-layout>
