<x-guest-layout>
    <h4 class="mb-1" style="font-family:'Poppins',sans-serif;font-weight:700;">Create Account</h4>
    <p class="text-muted mb-4" style="font-size:.88rem;">Join Sarab for faster ordering &amp; order tracking</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
            <label class="flbl" for="name">Full Name *</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="fctrl @error('name') is-invalid @enderror">
            @error('name') <small class="ferr">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="flbl" for="email">Email Address *</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="fctrl @error('email') is-invalid @enderror">
            @error('email') <small class="ferr">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="flbl" for="password">Password *</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="fctrl @error('password') is-invalid @enderror">
            @error('password') <small class="ferr">{{ $message }}</small> @enderror
        </div>

        <div class="mb-4">
            <label class="flbl" for="password_confirmation">Confirm Password *</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="fctrl @error('password_confirmation') is-invalid @enderror">
            @error('password_confirmation') <small class="ferr">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn-red w-100 justify-content-center">Register</button>

        <p class="text-center mt-4 mb-0" style="font-size:.88rem;">
            Already registered? <a href="{{ route('login') }}">Log in</a>
        </p>
    </form>
</x-guest-layout>
