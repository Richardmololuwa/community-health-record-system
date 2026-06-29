<x-guest-layout>

<div class="text-center mb-5">
    <h1 class="display-5 fw-bold">Create Account</h1>
    <p class="text-muted">
        Join the Community Health Record System.
    </p>
</div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label class="form-label fw-semibold"><i class="bi bi-person-fill me-2"></i>Full Name</label>
        <input
            type="text"
            name="name"
            class="form-control"
            value="{{ old('name') }}"
            required
            autofocus>

        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Email -->
    <div class="mb-3">
<label class="form-label fw-semibold">
    <i class="bi bi-envelope-fill me-2"></i>
    Email Address
</label>        <input
            type="email"
            name="email"
            class="form-control"
            value="{{ old('email') }}"
            required>

        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label class="form-label fw-semibold"><i class="bi bi-lock-fill me-2"></i>Password</label>
        <input
            type="password"
            name="password"
            class="form-control"
            required>

        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mb-4">
        <label class="form-label fw-semibold"><i class="bi bi-shield-lock-fill me-2"></i>Confirm Password</label>
        <input
            type="password"
            name="password_confirmation"
            class="form-control"
            required>
    </div>

    <button class="btn btn-primary w-100">
        Create Account
    </button>

    <div class="text-center mt-4">
        Already have an account?

        <a href="{{ route('login') }}">
            Sign In
        </a>
    </div>

</form>

</x-guest-layout>