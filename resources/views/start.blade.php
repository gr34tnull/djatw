<x-guest-layout>
<div class="relative flex items-center justify-center min-h-screen py-4 bg-gray-100 bg-center bg-no-repeat bg-cover items-top dark:bg-gray-900 sm:pt-0" style="background-image: url('{{asset('bg.png')}}')">
    <div class="static pb-20">
        <div class="flex flex-col items-center justify-center text-center">
            <x-jet-authentication-card-logo />
            <h1 class="py-4 text-6xl font-semibold text-center text-white font-rightsyd">around the world</h1>
            <p class="pt-10 pb-4 text-xl font-extrabold text-center text-white">Sign-up and get verified to get the latest for DJs by DJs</p>
            <a href="{{route('users.redirect')}}" class="px-12 py-4 text-2xl font-extrabold text-center text-white bg-gray-800 border-2 rounded-full hover:border-yellow-600">
                REGISTER NOW
            </a>
        </div>
    </div>
</div>
</x-guest-layout>