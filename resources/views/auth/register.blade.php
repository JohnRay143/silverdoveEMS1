@extends('auth.main')

@section('content')
    <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">
            <img src="{{ asset('admin_assets/img/Jackelou1.jpg') }}" alt="Description of the image" width="100%" height="100%">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form action="{{ route('register') }}" method="POST" class="user">
                @csrf
                <div class="form-group">
                  <input name="name" type="text" class="form-control form-control-user @error('name')is-invalid @enderror" id="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input name="email" type="email" class="form-control form-control-user @error('email')is-invalid @enderror" id="email" placeholder="Email Address" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="password" type="password" class="form-control form-control-user @error('password')is-invalid @enderror" id="password" placeholder="Password">
                    @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation')is-invalid @enderror" id="password-confirm" placeholder="Repeat Password" required autocomplete="new-password">
                    @error('password_confirmation')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Register Account</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
