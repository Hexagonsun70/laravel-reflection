<select id="company_id"
        name="company_id"
        class="bg-gray-700 text-yellow-400 p-2"
        required
>
    // If a value was previously entered on this form, keep that value selected on return after validation error
    @if( old('company_id') )
        <option value="{{ old('company_id') }}"
                selected
        >
            {{ $companies[old('company_id') - 1]->name  }}
        </option>
        @foreach(\App\Models\Company::all(['id', 'name'])->sortBy('name') as $company)
            @if($company->id == old('company_id'))
                @continue
            @else
                <option {{Route::getCurrentRequest()->query('company') == $company->id ? 'selected': '' }}
                        value="{{$company->id}}">
                    {{$company->name}}
                </option>
            @endif
        @endforeach
    // If a specific employee is being edited, display the current company as the selected option in the drop down
    @else
        <option value="{{ $employee->company_id }}"
                selected
        >
            {{ $companies[$employee->company_id - 1]->name  }}
        </option>
        @foreach(\App\Models\Company::all(['id', 'name'])->sortBy('name') as $company)
            @if($company->id == $employee->company_id)
                @continue
            @else
                <option {{Route::getCurrentRequest()->query('company') == $company->id ? 'selected': '' }}
                        value="{{$company->id}}">
                    {{$company->name}}
                </option>
            @endif
        @endforeach
    @endif
</select>
