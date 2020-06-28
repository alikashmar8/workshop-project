@extends('layouts.app')

@section('authentication')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5"></div>
            <div class="col-md-7">
                <div class="card auth">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="input-group">
                                <label for="name" class="col-md-4  text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="email"
                                       class="col-md-4  text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="password"
                                       class="col-md-4 text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-group">
                                <label for="password-confirm"
                                       class="col-md-4 text-md-right">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">

                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            @php( $admin = \App\User::where("id",2)->get() )
                            <input id="activated" type="hidden" class="form-control" name="activated"
                                   value="{{$admin->first()->activated}}" required autocomplete="activated">

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-2" style="text-align: center;">
                                    <br>
                                    <a class="nav-link1" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
