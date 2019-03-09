@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Storehouse
        @endcomponent
    @endslot
    Hi,
    {{ $user->name }}, welcome to Kobo Accountant.

    To start using your account you need to activate your account by using this code: {{ $user->activation_token }}

    You can also click the button below, it will take you to where you'll put the activation code.
    You can also click on the Button below to activate account.

    We hope you'd enjoy the platform.

    Regards,<br>
    {{ \App\Config\MailConfig::getConfig('DEFAULT_EMAIL_NAME') }}

    @component('mail::button', ['url' => \Illuminate\Support\Facades\URL::signedRoute('activate.account', ['activation_key' => $user->activation_token])])
        Login
    @endcomponent

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <!-- footer here -->
        @endcomponent
    @endslot
@endcomponent
