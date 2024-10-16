@component('mail::message')

Hi <b>{{ $user->name }}</b>,

@php
    $getSetting = App\Models\SystemSettingModel::getSingle();
@endphp

<p>It seems like you have requested to reset your password for your <strong>{{ $getSetting->website_name }}</strong> website account.</p>

<p>Simply click the button below to reset your password:</p>

<p>
@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Reset Password
@endcomponent
</p>

<p>If you did not request a password reset, no further action is required.</p>

Thanks,<br>
<strong>{{ $getSetting->website_name }}</strong>

@endcomponent
