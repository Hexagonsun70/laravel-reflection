<x-layout>
    <section class="flex flex-col items-center m-4">
        <div class="flex flex-col justify-center items-center bg-gray-800 rounded-xl mb-2">
            <h1 class="font-bold text-2xl tracking-wide uppercase text-center text-yellow-400 w-96 m-4">
                Companies
            </h1>
            <div class="mb-8 mt-2 capitalize">
                <a class="font-bold tracking-wider p-2 bg-green-400 text-white rounded ml-2 mt-2">
                    Companies Table
                </a>
                <a href="/employees" class="font-bold tracking-wider p-2 bg-green-400 text-white rounded ml-2 mt-2">
                    All Employees
                </a>
            </div>
        </div>

        <div class="flex flex-wrap justify-center">

            @foreach($companies as $company)

                <div id="company-card"
                     class="my-2 mx-2 bg-gray-800 text-green-400 p-4 rounded-xl bg-auto w-96 flex items-center leading-none">
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
            @endforeach

        </div>

    </section>
</x-layout>
