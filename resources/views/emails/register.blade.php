@component('mail::message')

Hi <b>{{ $user->name }}</b>,
@php
    $getSetting = App\Models\SystemSettingModel::getSingle();
@endphp
<p>You are most welcome thank you for choosing <strong>{{ $getSetting->website_name }}</strong> </p>

<p>Simply click the button below to verify your email address.</p>

<p>
@component('mail::button', ['url' => url('activate/'.base64_encode($user->id))])
Verify
@endcomponent
</p>

<p>This will verify your email address, and then you will officially be part of the <strong>{{ $getSetting->website_name }}</strong> online platform.</p>

Thanks,<br>
<strong>{{ $getSetting->website_name }}</strong>

@endcomponent
