<x-layout>
    <section class=" h-auto ">
        <div class="m-8">
            <a href="/">
                <div class="flex items-center">
                    <span class="text-gray-800 text-xl p-2">
                        <i class="fas fa-angle-double-left"></i>
                        Dashboard
                    </span>
                </div>
            </a>
            <div id="container" class=" bg-gray-800 text-green-400 flex flex-col items-center h-auto p-4 rounded-xl ">
                <h1 class="flex text-center text-2xl">All Companies</h1>
                <div id="table-container border border-white border-dashed    "
                     class="pt-4"
                >
                    <x-table.table :headers="['Name', 'email', 'website', 'logo', ['name' => '', 'border' => 'bottom']]">
                        @foreach($companies as $company)
                            <tr class="pb-2 hover:bg-gray-800">
                                <x-table.td>{{ $company->name }}</x-table.td>
                                <x-table.td>{{ $company->email }}</x-table.td>
                                <x-table.td>{{ $company->website }}</x-table.td>
                                <td class="border-r border-dashed">
                                    <img src="{{ $company->logo }}"
                                                 alt="{{$company->name}} logo"
                                                 class="h-24 w-24 m-1"
                                    >
                                </td>
                                <td class="p-1 px-4 h-28 flex justify-center items-center">
                                    <form action="{{ route('companies.show', $company) }}">
                                        <x-table.btn-s />
                                    </form>

                                    <form action="{{ route('companies.edit', $company) }}">
                                        <x-table.btn-e />
                                    </form>

                                    <form action="{{ route('companies.destroy', $company) }}">
                                        <x-table.btn-d />
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </x-table.table>

                    <div class="pt-4">
                        {{ $companies->links() }}
                    </div>

                    <div class="flex justify-center ">
                        <a href="companies\create" class="pt-8">
                            <button class="bg-green-600 text-white rounded w-auto flex items-center justify-center py-2 px-4">
                                Add Company
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-layout>
