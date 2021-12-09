<x-layout>
    <section class=" h-auto ">
        <div id="container" class=" bg-gray-800 text-green-400 flex flex-col items-center h-auto p-4 rounded-xl m-8">
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
                                <a href="edit-company-{{ $company->id }}"><x-table.btn-e /></a>
                                <a href="delete-company-{{ $company->id }}"><x-table.btn-d /></a>
                            </td>
                        </tr>
                    @endforeach
                </x-table.table>

                <div class="pt-4">
                    {{ $companies->links() }}
                </div>

                <div class="flex justify-center ">
                    <a  href="company/create" class="pt-8">
                        <button class="bg-green-600 text-white rounded w-auto flex items-center justify-center py-2 px-4">
                            Add Company
                        </button>
                    </a>
                </div>

            </div>
        </div>
    </section>
</x-layout>
