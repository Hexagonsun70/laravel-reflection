<select name="logos"
        id="logos"
        class="bg-gray-700 p-2 my-2 w-full"
        x-model="imgSrc"
        required
>
    @if ( old('logos') )
        {{ logger('Evaluated as old logos') }}
        // if old logo is equivalent to the current company logo, it will stay highlighted
        // signifying that it is the current company logo.
        @if ( old('logos') == $company->logos )
            {{ logger('Evaluated as old logos == to company logos') }}
            <option value="{{ old('logos') }}"
                    class="text-green-400"
            >
                {{ substr(old('logos'), 13, -4) }}
            </option>
            @foreach ($logos as $logo)
                @if($company->logos == $logo->file_path)
                    @continue
                @endif
                <option class="p-2 text-yellow-400"
                        value="{{ $logo->file_path }}"
                >
                    {{ substr($logo->file_path, 13, -4) }}
                </option>
            @endforeach
        @elseif( old('logos') != $company->logos)
            {{ logger('Evaluated as old logos != to company logos') }}
            {{ logger( old('logos') ) }}
            <option value="{{ old('logos') }}"
                    class="text-yellow-400"
                    selected
            >
                {{ substr(old('logos'), 13, -4) }}
            </option>
            @foreach ($logos as $logo)
                @if($logo->file_path == old('logos'))
                    @continue
                @endif
                @if($company->logos == $logo->file_path)
                    <option class="p-2 text-green-400"
                            value="{{ $logo->file_path }}"
                    >
                        {{ substr($logo->file_path, 13, -4) }}
                    </option>
                    @continue
                @endif
                <option class="p-2 text-yellow-400"
                        value="{{ $logo->file_path }}"
                >
                    {{ substr($logo->file_path, 13, -4) }}
                </option>
            @endforeach
        @endif
    @elseif ( empty(old('logos')) )
        {{ logger('Evaluated as old logos empty') }}
        <option value="{{ $company->logos }}"
                class="text-green-400"
        >
            {{ substr($company->logos, 13, -4) }}
        </option>
        @foreach ($logos as $logo)
            @if($company->logos == $logo->file_path)
                @continue
            @endif
            <option class="p-2 text-yellow-400"
                    value="{{ $logo->file_path }}"
            >
                {{ substr($logo->file_path, 13, -4) }}
            </option>
        @endforeach
    @endif
</select>
