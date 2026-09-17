<x-guest-layout>
    <h4 class="mb-1" style="font-family:'Poppins',sans-serif;font-weight:700;">Forgot Password</h4>
    <p class="text-muted mb-4" style="font-size:.88rem;">Enter your email and we'll send you a reset link.</p>

    @if (session('status'))
        <div class="sucmsg" style="display:block;margin-bottom:20px;"><p>{{ session('status') }}</p></div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-4">
            <label class="flbl" for="email">Email Address *</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="fctrl @error('email') is-invalid @enderror">
            @error('email') <small class="ferr">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn-red w-100 justify-content-center">Email Password Reset Link</button>
    </form>
</x-guest-layout>
