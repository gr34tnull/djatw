@component('mail::message')
# Thank you for signing up at <a class="text-blue-800 no-underline" href="https://www.djsaroundtheworld.com/" target="_blank">www.djsaroundtheworld.com</a>

Your account has already been verified and approved. 
Click on the button below to make your payment, please make sure you have already logged in.

@component('mail::button', ['url' => $link])
PAY NOW
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent