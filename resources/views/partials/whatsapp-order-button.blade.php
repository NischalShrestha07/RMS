@php
    $waDigits = preg_replace('/\D/', '', \App\Models\SiteSetting::get('phone', ''));
    $waMessage = "Hi Sarab! Confirming my order #{$order->order_number} - Total $".number_format($order->total, 2).". Please confirm and share the estimated time. Thank you!";
@endphp
@if ($waDigits)
    <a href="https://wa.me/{{ $waDigits }}?text={{ rawurlencode($waMessage) }}" target="_blank" rel="noopener" class="btn-whatsapp">
        <i class="fab fa-whatsapp"></i>Confirm via WhatsApp
    </a>
@endif
