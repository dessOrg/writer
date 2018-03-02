<h2>Verify Your Wtiter Account</h2>

<p>Click here to verify your account: <a href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}">{{ $link }}</a></p>
