@component('mail::message')

Hi <b>{{ $user->name }}</b>,

<p>You are most welcome to our Electronic Mail Trading services!</p>

<p>Simply click the button below to verify your email address.</p>

@component('mail::button', ['url' => url('active/'.base64_encode($user->id))])
Verify
@endcomponent

<p>This will verify your email address, and then you will officially be part of the E-Commerce platform.</p>

Thanks,<br>
{{ config('app.name') }}

@endcomponent
