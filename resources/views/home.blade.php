<x-layout>

    @auth
    {{--insert content when auth--}}
    @else
    <x-login />
    @endauth

</x-layout>

