<x-guest-layout>
    <div class="pt-4 bg-gray-900">
        <div class="flex flex-col items-center min-h-screen bg-center bg-no-repeat bg-cover sm:pt-0" style="background-image: url('{{asset('bg.png')}}')">
            <div class="flex flex-col items-center pt-6">
                <x-jet-authentication-card-logo />
                <h1 class="pt-4 text-6xl font-semibold text-center text-white font-rightsyd">around the world</h1>
            </div>

            <div class="w-full p-6 mt-6 overflow-hidden overflow-y-auto prose bg-white shadow-md sm:max-w-2xl sm:rounded-lg h-96 no-scrollbar">
                {!! $terms !!}
            </div>
        </div>
    </div>
</x-guest-layout>
