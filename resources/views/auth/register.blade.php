@extends('layouts.authapp')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>ARS-</b>TREASURE</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">{{ __('Register a new membership') }}</p>

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="input-group mb-3">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Full name') }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          
          @error('name')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            </span>
            @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required autocomplete="email">
          
          @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
         @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="address"  type="text" class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('address') }}"  name="address" value="{{ old('address') }}" required autocomplete="address">
          
          @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
         @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" placeholder="{{ __('City') }}" name="city" value="{{ old('city') }}" required autocomplete="city">
          
          @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
         @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-city"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" placeholder="{{ __('State') }}" name="state" value="{{ old('state') }}" required autocomplete="state">
          
          @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
         @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker-alt"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" placeholder="{{ __('Country') }}" name="country" value="{{ old('country') }}" required autocomplete="country">
          
          @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
         @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-globe-europe"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input id="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror" placeholder="{{ __('Pincode') }}" name="pincode" value="{{ old('pincode') }}" required autocomplete="pincode">
          
          @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
         @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fab fa-usps"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" placeholder="{{ __('Telephone') }}" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">
          
          @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
         @enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-mobile-alt"></span>
            </div>
          </div>
        </div>


        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" name="password" required autocomplete="new-password">
          @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required autocomplete="new-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"> {{ __('Register') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

@section('content')

@endsection
