<x-guest-layout>
    <h4 class="mb-1" style="font-family:'Poppins',sans-serif;font-weight:700;">Confirm Password</h4>
    <p class="text-muted mb-4" style="font-size:.88rem;">This is a secure area. Please confirm your password before continuing.</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="mb-4">
            <label class="flbl" for="password">Password *</label>
            <input id="password" type="password" name="password" required autocomplete="current-password" class="fctrl @error('password') is-invalid @enderror">
            @error('password') <small class="ferr">{{ $message }}</small> @enderror
        </div>

        <button type="submit" class="btn-red w-100 justify-content-center">Confirm</button>
    </form>
</x-guest-layout>
