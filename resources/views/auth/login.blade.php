@extends('layouts.app')

@section('content')
<main class="form-signin">
    <h1 class="h3 text-center mb-3 fw-normal">{{ __("login_trans.Login") }}</h1>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="form-floating">
        <label for="floatingInput">{{ __("login_trans.Email") }}</label>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    </div>
    <div class="form-floating">
        <label for="floatingPassword">{{ __("login_trans.Password") }}</label>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="********">
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" name="remember" value="remember-me"> {{ __("login_trans.Remember Me") }}
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __("login_trans.Login") }}</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
  </form>
</main>


@endsection
