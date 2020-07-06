@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pt-5 justify-content-center">
        <div class="col-md-8 p-5">
            <div class="signup-form" style="width: 590px;">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2 class="mt-10">Create Account</h2>
                    <p class="lead">It's free and hardly takes more than 30 seconds.</p>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon p-2"><i class="fa fa-user"></i></span>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Username" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon p-2"><i class="fa fa-paper-plane"></i></span>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon p-2"><i class="fa fa-lock"></i></span>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon p-2">
                                <i class="fa fa-lock"></i>
                                <!-- <i class="fa fa-check"></i> -->
                            </span>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Captcha</label>
                        <p>{{getCaptchaQuestion()}}</p>
                        <input placeholder="Enter result" class="form-control @error('_answer') is-invalid @enderror" name="_answer" type="number">
                        @error('_answer')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Sign Up</button>
                    </div>
                    <p class="small text-center">By clicking the Sign Up button, you agree to our <br><a href="/terms">Terms &amp; Conditions</a>, and <a href="/terms">Privacy Policy</a>.</p>
                </form>
                <div class="text-center">Already have an account? <a href="/login">Login here</a>.</div>
            </div>
        </div>
    </div>
</div>
@endsection
