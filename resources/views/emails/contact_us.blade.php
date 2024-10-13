@component('mail::message')
# 📩 New Contact Us Inquiry

Hello **Admin**,

You have received a new message through the **Contact Us** form on your website. Below are the details of the inquiry:

---

### 📄 **Sender Details**  
- **Name**: {{ $user->name }}  
- **Email**: [{{ $user->email }}](mailto:{{ $user->email }})  
- **Subject**: {{ $user->subject }}

---

### 📝 **Message**  
@component('mail::panel')
{{ $user->message }}
@endcomponent

---

Thanks,  
The **{{ config('app.name') }}** Team

---

@slot('footer')
<div style="text-align: center;">
    © {{ date('Y') }} **{{ config('app.name') }}**. All rights reserved.  
    [Visit Our Website]({{ url('/') }})
</div>
@endslot
@endcomponent
