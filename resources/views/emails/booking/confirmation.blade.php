@component('mail::message')
# Booking Confirmation

Hello {{ $booking->user->name }},

Your booking for the service **{{ $booking->service->name }}** on **{{ $booking->booking_date }}** has been received.

Thank you for booking with us!

Thanks,<br>
{{ config('app.name') }}
@endcomponent
