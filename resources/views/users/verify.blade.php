@php
use PragmaRX\Countries\Package\Countries;
$countries = new Countries();
$countries = $countries->all()->pluck('name.common')->toArray();
$DJtype = array('CLUB DJ','RADIO DJ','VIDEO DJ','MUSIC ENTHUSIAST');
@endphp
<div class="flex flex-col items-center justify-center min-h-screen -mt-10">
    <div class="w-full px-6 py-4 overflow-hidden bg-gray-900 shadow-md sm:max-w-md sm:rounded-lg">
        <div class="flex flex-col items-center justify-center py-4 text-center">
            <x-jet-authentication-card-logo />
            <h1 class="py-2 text-6xl font-semibold text-center text-white font-rightsyd">around the world</h1>
            <p class="pb-2 text-lg font-extrabold text-white">Thank you for Signing Up.</p>
            <small class="text-xs text-white">
            To complete your application please complete the fields below with the correct information. Your application will be approved once it is verified that you are a DJ. You will receive an email within 24 hours if your account has been activated.
            </small>
        </div>
        <div class="p-4 bg-white rounded-xl">
        <form method="POST" action="{{ route('users.update',auth()->user()->id) }}">
        @csrf
        @method('patch')
            <div>
                <x-jet-label for="fb_profile" value="{{ __('FB Profile URL') }}" />
                <x-jet-input id="fb_profile" class="block w-full mt-1" type="text" name="fb_profile" placeholder="https://www.facebook.com/xxxxxxx/" value="{{ auth()->user()->fb_profile }}" required autofocus />
            </div>
            <div class="pt-2">
                <x-jet-label for="affiliation" value="{{ __('Club or Radio Affiliation') }}" />
                <x-jet-input id="affiliation" class="block w-full mt-1" type="text" name="affiliation" value="{{ auth()->user()->affiliation }}" required autofocus />
            </div>
            <div class="pt-2">
                <select id="type" name="type" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    @foreach($DJtype as $type)
                    <option id="type" name="type" value="{{$type}}" {{ $type == auth()->user()->type ? 'selected' : '' }}>{{$type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="pt-2">
                <select id="country" name="country" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                    @foreach($countries as $country)
                    <option id="country" name="country" value="{{$country}}" {{ $country == auth()->user()->country ? 'selected' : '' }}>{{$country}}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-center mt-2">
                <x-jet-button class="w-full">
                    {{ __('SUBMIT') }}
                </x-jet-button>
            </div>
        </form>
        </div>
    </div>
</div>