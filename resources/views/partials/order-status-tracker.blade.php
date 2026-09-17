@php
    $trackSteps = [
        'pending' => ['label' => 'Pending', 'icon' => 'fa-receipt'],
        'confirmed' => ['label' => 'Confirmed', 'icon' => 'fa-check'],
        'preparing' => ['label' => 'Preparing', 'icon' => 'fa-utensils'],
        'ready' => ['label' => 'Ready', 'icon' => 'fa-box'],
        'out_for_delivery' => ['label' => 'Out for Delivery', 'icon' => 'fa-motorcycle'],
        'delivered' => ['label' => 'Delivered', 'icon' => 'fa-flag-checkered'],
    ];
    $trackKeys = array_keys($trackSteps);
    $trackCurrent = array_search($order->status, $trackKeys, true);
@endphp

@if ($order->status === 'cancelled')
    <div class="order-track-cancelled"><i class="fas fa-times-circle me-2"></i>This order was cancelled.</div>
@else
    <div class="order-track">
        @foreach ($trackSteps as $step)
            <div class="order-track-step {{ $loop->index < $trackCurrent ? 'done' : ($loop->index === $trackCurrent ? 'active' : '') }}">
                <div class="order-track-dot"><i class="fas {{ $step['icon'] }}"></i></div>
                <div class="order-track-label">{{ $step['label'] }}</div>
            </div>
        @endforeach
    </div>
@endif
