@extends('student.mottaki')
@section('Title')
Login &mdash;please Login
@endsection
@section('UserName')
    MottakiSchool
@endsection
@section('content')
<style>
  .divider:after,
.divider:before {
  content: "";
  flex: 1;
  height: 1px;
  background: #eee;
}
</style>
        @if (session('success'))
            <div class="alert alert-success">
                <ul>
                        <li>{{session('success')}}</li>
                </ul>
            </div>
        @endif
<section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img data-aos="fade-right" src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg" class="img-fluid" alt="Phone image">
        </div>
        <!--    sign up     -->
        <div data-aos="fade-up" class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <h2 class="mb-5">Sign in</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="form1Example13" placeholder="Enter a valid email address" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
              <label class="form-label " for="form1Example13">{{ __('Email Address') }}</label>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" id="form1Example23" placeholder="Enter password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
              <label class="form-label" for="form1Example23">{{ __('Password') }}</label>
              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input style="top: 0;left: 0;height: 20px;width: 20px;" class="form-check-input" type="checkbox" name="remember" id="form1Example3" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="form1Example3"> {{ __('Remember Me') }} </label>
              </div>
              @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
{{--
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
            </div>

            <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!" role="button">
              <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
            </a>
            <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!" role="button">
              <i class="fab fa-twitter me-2"></i>Continue with Twitter</a> --}}

          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
