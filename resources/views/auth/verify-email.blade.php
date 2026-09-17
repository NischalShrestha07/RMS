<x-guest-layout>
    <h4 class="mb-1" style="font-family:'Poppins',sans-serif;font-weight:700;">Verify Your Email</h4>
    <p class="text-muted mb-4" style="font-size:.88rem;">Thanks for signing up! Please verify your email address by clicking the link we just emailed you. Didn't get it? We'll gladly send another.</p>

    @if (session('status') == 'verification-link-sent')
        <div class="sucmsg" style="display:block;margin-bottom:20px;"><p>A new verification link has been sent to the email address you provided during registration.</p></div>
    @endif

    <div class="d-flex align-items-center justify-content-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn-red">Resend Verification Email</button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-muted" style="font-size:.85rem;">Log Out</button>
        </form>
    </div>
</x-guest-layout>
