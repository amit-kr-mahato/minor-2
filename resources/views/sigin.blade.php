@extends('layouts.app')

@section('content')
    <div class="modall" id="exampleModal" tabindex="-1">
        <div class="modal-content mt-5 mb-5">
            <div class="modal-body">
                {{-- LOGIN FORM START --}}
                <form action="{{ route('signincheck') }}" method="POST">
                    @csrf
                    <div class="container d-flex justify-content-center align-items-center">
                        <div class="row border rounded-5 p-3 bg-white shadow box-area">
                            {{-- Left Box --}}
                            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                                style="background: #103cbe;">
                                <div class="featured-image mb-3">
                                  <img src="data:image/png;base64,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"
                                        class="img-fluid" style="width: 250px;">
                                </div>
                                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">
                                    Be Verified
                                </p>
                                <small class="text-white text-wrap text-center" style="width: 17rem;">
                                    Join experienced on this platform.
                                </small>
                            </div>

                            {{-- Right Box --}}
                            <div class="col-md-6 right-box">
                                <div class="row align-items-center">
                                    <div class="header-text mb-4">
                                        <h2>Hello, Again</h2>
                                        <p>We are happy to have you back.</p>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" name="email" value="{{ old('email') }}"
                                            class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror"
                                            placeholder="Email address">
                                        @error('email')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="input-group mb-1">
                                        <input type="password" name="password"
                                            class="form-control form-control-lg bg-light fs-6"
                                            placeholder="Password" id="myInput2" required minlength="6">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <small>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
                                            Forgot Password?
                                        </a>
                                    </small>

                                    <div class="input-group mb-3 mt-3">
                                        <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                                    </div>

                                    <div class="row">
                                        <small>Don't have account? <a href="{{ route('signup') }}" class="fs-5">Sign Up</a></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- LOGIN FORM END --}}
            </div>
        </div>
    </div>

    {{-- ✅ FORGOT PASSWORD MODAL OUTSIDE THE LOGIN FORM --}}
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1"
        aria-labelledby="forgotPasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow rounded-3">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="forgotPasswordModalLabel">Reset Your Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="resetEmail" class="form-label">Enter your email address</label>
                            <input type="email" name="email" id="resetEmail"
                                class="form-control @error('email') is-invalid @enderror"
                                required placeholder="you@example.com">

                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror

                            @if (session('status'))
                                <div class="alert alert-success mt-2" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer border-0">
                        <button type="submit" class="btn btn-primary w-100">Send Reset Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
