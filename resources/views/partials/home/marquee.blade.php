@php
   $marqueeItems = ['Crispy Fried Chicken', 'Gourmet Burgers', 'Artisan Pizzas', 'Fresh Wraps &amp; Rolls', 'Loaded Fries', 'Ice Cream Shakes', 'Grilled Sandwiches'];
@endphp
<div class="mqsec">
   <div class="mqtrack">
      @foreach (array_merge($marqueeItems, $marqueeItems) as $item)
      <div class="mqitem"><i class="fas fa-circle"></i>{!! $item !!}</div>
      @endforeach
   </div>
</div>
