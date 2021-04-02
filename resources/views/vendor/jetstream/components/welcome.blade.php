@if(is_null(auth()->user()->email_verified_at))
    @include('users.verify')
@else
    @include('payments.pay')
@endif
