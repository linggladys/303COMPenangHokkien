@component('mail::message')
# Change Password Via Verifying OTP
You are receiving this email because we received a password update request for your account.
Below displays the OTP to change the user password.

<h1 style="text-align: center">{{ $otp }}</h1>

Kam sia 🙂<br>
{{ config('app.name') }}
@endcomponent
