@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Storehouse
        @endcomponent
    @endslot
    Hi,
    {{ $user->name }}, welcome to Kobo Accountant.

    <p>You have been added as a Staff on Kobo Accountant. You should reset your password immediately to start using your account</p>

    Regards,<br>
    {{ \App\Config\MailConfig::getConfig('DEFAULT_EMAIL_NAME') }}

    @component('mail::button', ['url' => route('password.request')])
        Reset Password
    @endcomponent

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <!-- footer here -->
        @endcomponent
    @endslot
@endcomponent
