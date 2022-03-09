<select type="text"
        name="logos"
        class="bg-gray-700 p-2 w-full text-yellow-400 mt-2"
        x-model="imgSrc"
        required
>
    @if( old('logos') )
        <option selected
                value="{{ old('logos') }}"
        >
            {{ substr(old('logos'), 13, -4) }}
        </option>
        @foreach ($logos as $logo)
            @if( $logo->file_path == old('logos'))
                @continue
            @endif
            <option class="p-2 text-yellow-400"
                    value="{{ $logo->file_path }}"
                    selected=""
            >
                {{ substr($logo->file_path, 13, -4) }}
            </option>
        @endforeach
    @else

        <option disabled
                selected
                hidden
                value
        >
            Please Upload and Select a Logo
        </option>
        @foreach ($logos as $logo)
            <option class="p-2 text-yellow-400"
                    value="{{ $logo->file_path }}"
                    selected=""
            >
                {{ substr($logo->file_path, 13, -4) }}
            </option>
        @endforeach
    @endif
</select>
