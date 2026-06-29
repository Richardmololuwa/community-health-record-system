<x-guest-layout>

<div class="text-center mb-4">
<h1 class="fw-bold mb-2">Welcome Back 👋</h1>    <p class="text-muted mb-4">
Sign in to your Community Health Record System account.
</p>
</div>

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email -->
    <div class="mb-3">
        <label class="form-label fw-semibold">Email Address</label>

        <input
            type="email"
            name="email"
            class="form-control form-control-lg rounded-4"
            value="{{ old('email') }}"
            required
            autofocus
        >

        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-3">

        <label class="form-label fw-semibold">
            Password
        </label>

        <input
            type="password"
            name="password"
            class="form-control form-control-lg rounded-4"
            required
        >

        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div class="form-check">

            <input
                class="form-check-input"
                type="checkbox"
                name="remember"
            >

            <label class="form-check-label">
                Remember me
            </label>

        </div>

        @if(Route::has('password.request'))

            <a href="{{ route('password.request') }}">
                Forgot password?
            </a>

        @endif

    </div>

    <button
        class="btn btn-primary btn-lg w-100 rounded-4">

        Sign In

    </button>

    <div class="text-center mt-4">

        Don't have an account?

        <a href="{{ route('register') }}">
            Create one
        </a>

    </div>

</form>

</x-guest-layout>