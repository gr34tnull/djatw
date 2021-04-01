<x-app-layout>
    @if(auth()->user()->admin == true)
        @livewire('users')
    @else
        <x-jet-welcome />
    @endif
</x-app-layout>
