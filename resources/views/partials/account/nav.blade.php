<div class="fcard mb-4">
   <div class="d-flex flex-wrap gap-2">
      <a href="{{ route('account.dashboard') }}" class="btn {{ request()->routeIs('account.dashboard') ? 'btn-red' : 'btn-outline-secondary' }}">Overview</a>
      <a href="{{ route('account.orders.index') }}" class="btn {{ request()->routeIs('account.orders.*') ? 'btn-red' : 'btn-outline-secondary' }}">My Orders</a>
      <a href="{{ route('account.reservations.index') }}" class="btn {{ request()->routeIs('account.reservations.*') ? 'btn-red' : 'btn-outline-secondary' }}">My Reservations</a>
      <a href="{{ route('profile.edit') }}" class="btn {{ request()->routeIs('profile.edit') ? 'btn-red' : 'btn-outline-secondary' }}">Profile</a>
      <form method="POST" action="{{ route('logout') }}" class="ms-auto">
         @csrf
         <button type="submit" class="btn btn-outline-secondary">Log Out</button>
      </form>
   </div>
</div>
