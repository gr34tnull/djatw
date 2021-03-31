<x-guest-layout>
<div class="relative flex items-center justify-center min-h-screen py-4 bg-gray-100 bg-center bg-no-repeat bg-cover items-top dark:bg-gray-900 sm:pt-0" style="background-image: url('{{asset('bg.png')}}')">
    <div class="static pb-20">
        <div class="flex flex-col items-center justify-center text-center">
            <x-jet-authentication-card-logo />
            <h1 class="py-4 text-6xl font-semibold text-center text-white font-rightsyd">around the world</h1>
            <p class="pt-10 pb-4 text-xl font-extrabold text-center text-white">Sign-up and get verified to get the latest for DJs by DJs</p>
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <a href="{{ url('auth/facebook') }}" class="px-12 py-4 text-2xl font-extrabold text-center text-white bg-gray-800 border-2 rounded-full hover:border-yellow-600">
                    REGISTER NOW
                </a>
            </form>
        </div>
    </div>
</div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1065449943963770',
      xfbml      : true,
      version    : 'v10.0'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</x-guest-layout>