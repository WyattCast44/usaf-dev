@component('mail::message')
# Hi there,

A new USAF.Cloud account has been created for you. Please login and set up your account, you will be required to set a password. This link will expire in 5 days.

@component('mail::button', ['url' => {{ route('user.invite.accept') }}])
Accept Invite
@endcomponent

Thank you,<br>
{{ config('app.name') }}
@endcomponent
