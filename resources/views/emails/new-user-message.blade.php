@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Kobo Accountant
        @endcomponent
    @endslot
    Hi,
    {{ $user->name }},

    {{ $message }}

    Regards,<br>
    {{ \App\Config\MailConfig::getConfig('DEFAULT_EMAIL_NAME') }}

    {{--@component('mail::button', ['url' => route('user.dashboard')])--}}
        {{--View Account--}}
    {{--@endcomponent--}}

    {{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            <!-- footer here -->
        @endcomponent
    @endslot
@endcomponent
