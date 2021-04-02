@component('mail::message')
# Please be informed that you have not completed your registration at <a class="text-blue-800 no-underline" href="https://www.djsaroundtheworld.com/" target="_blank">www.djsaroundtheworld.com</a>

Please go to the site and complete your registration. You must make sure to fill out the forms correctly by putting your linked and active facebook url (not your facebook page).

Your linked facebook should show proofs that you are an active DJ before pandemic at least to be approved.

@component('mail::button', ['url' => 'https://djsaroundtheworld.com/'])
REGISTER
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent