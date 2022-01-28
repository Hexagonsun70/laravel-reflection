<x-layout>
    <section class=" grow-div ">
        <div class="m-8 h-auto">
            <a href="/">
                <div class="flex items-center">
                    <span class="text-gray-800 text-xl p-2">
                        <i class="fas fa-angle-double-left"></i>
                        Dashboard
                    </span>
                </div>
            </a>
            <div id="container" class="bg-gray-800 text-green-400 flex flex-col items-center h-auto p-4 rounded-xl container-c">
                <div class="flex items-start w-full mr-4">
                    <h1 class="flex text-center text-2xl justify-center flex-grow">All Companies</h1>
                    <div class="">
                        <form action="" method="get" class="flex">
                            <div>
                                <x-input id="search"
                                         class="w-64 bg-gray-700 p-2 rounded-lg
                                             placeholder-green-500 placeholder-opacity-90"
                                         type="text"
                                         name="search"
                                         :value="request('search')"
                                         placeholder="Search..."
                                />
                            </div>
                            <button class="text-white rounded-lg bg-indigo-600 ml-2 w-10">
                                <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="pt-4"
                >
                    @if($companies[0])
                    <x-table.table-c id="myTable">
                        @foreach($companies as $company)
                            <tr class="pb-2 hover:bg-gray-800">
                                <x-table.td>{{ $company->name }}</x-table.td>
                                <x-table.td>
                                    <a href="mailto:{{$company->email}}" class="underline">{{ $company->email }}</a>
                                </x-table.td>
                                <x-table.td>
                                    <a href="#" class="underline">{{ $company->website }}</a>
                                </x-table.td>
                                <td class="border-r border-dashed">
                                    <img src="{{ $company->logos }}"
                                         alt="{{$company->name}} logo"
                                         class="h-24 w-24 ml-3 object-center"
                                    >
                                </td>
                                <td class="p-1 px-4 h-28 flex justify-center items-center">
                                    <form action="{{ route('companies.show', $company) }}">
                                        <x-table.btn-s />
                                    </form>

                                    <form action="{{ route('companies.edit', $company) }}">
                                        <x-table.btn-e />
                                    </form>

                                    <div x-data="{open: false}">
                                        <x-modal.c-del :company="$company"/>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </x-table.table-c>
                    @else
                        <p class="text-yellow-400 text-2xl uppercase">No companies found</p>
                    @endif
                    <div class="pt-4">
                        {!! $companies->appends(\Request::except('page'))->render() !!}
                    </div>

                    <div class="flex justify-center ">
                        <a href="companies\create" class="pt-4">
                            <button class="bg-green-600 hover:bg-green-700 text-white rounded w-auto flex items-center justify-center py-2 px-4">
                                Add Company
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="grow-child">

        </div>
    </section>
</x-layout>
