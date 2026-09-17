<x-guest-layout>
    <h4 class="mb-1" style="font-family:'Poppins',sans-serif;font-weight:700;">Welcome Back</h4>
    <p class="text-muted mb-4" style="font-size:.88rem;">Log in to your Sarab account</p>

    @if (session('status'))
        <div class="sucmsg" style="display:block;margin-bottom:20px;"><p>{{ session('status') }}</p></div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="flbl" for="email">Email Address *</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="fctrl @error('email') is-invalid @enderror">
            @error('email') <small class="ferr">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="flbl" for="password">Password *</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="fctrl @error('password') is-invalid @enderror">
            @error('password') <small class="ferr">{{ $message }}</small> @enderror
        </div>

        <div class="d-flex align-items-center justify-content-between mb-4">
            <label class="d-flex align-items-center gap-2" style="font-size:.85rem;">
                <input type="checkbox" name="remember">
                Remember me
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" style="font-size:.85rem;">Forgot your password?</a>
            @endif
        </div>

        <button type="submit" class="btn-red w-100 justify-content-center">Log In</button>

        <p class="text-center mt-4 mb-0" style="font-size:.88rem;">
            Don't have an account? <a href="{{ route('register') }}">Register</a>
        </p>
    </form>
</x-guest-layout>
