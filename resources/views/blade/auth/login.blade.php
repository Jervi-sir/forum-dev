@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="{{ asset('css/auth.css')}}">
@endsection

@section('top-script')

@endsection

@section('title')
<title>Login</title>
@endsection


@section('body')
<main >
    <h1>Welcome to Dev Community</h1>
    <h3>community of 5,235 amazing developers</h3>
    <div class="button-container">
        <a class="button-wide black" href="{{ url('auth/github') }}">
            <img src="{{ asset('images/github.svg')}}" alt="">
            <span>Continue with Github</span>
        </a>
        <a class="button-wide blue" href="{{ route('social.oauth', 'twitter') }}">
            <img src="{{ asset('images/twitter.svg')}}" alt="">
            <span>Continue with Twitter</span>
        </a>
        <a class="button-wide grey" href="{{ route('social.oauth', 'google') }}">
            <img src="{{ asset('images/google.svg')}}" alt="">
            <span>Continue with Google</span>
        </a>
    </div>

    <div class="separator">
        <span class="line">
            <img src="{{ asset('images/line.svg')}}" alt="">
        </span>
        <span>log in</span>
        <span class="line">
            <img src="{{ asset('images/line.svg')}}" alt="">
        </span>
    </div>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="row">
            <label for="email">{{__('Email')}}</label>
            <input name="email" id="email" type="email" :value="old('email')">
        </div>
        <div class="row">
            <label for="password">{{__('Password')}}</label>
            <input name="password" id="password" type="password" required autocomplete="current-password" >
        </div>
        <div class="row-half">
            <div class="half">
                <input name="remember" id="remember_me" class="checkbox" type="checkbox" name="" id="">
                <span>{{ __('Remember me') }}</span>
            </div>
            <div class="half">
                @if (Route::has('password.request'))
                <a class="forgot" href="{{ route('password.request') }}">
                    I forgot my password
                </a>
                @endif
            </div>
        </div>
        <button class="button-wide dark-blue" type="submit">
            {{ __('Log in') }}
        </button>
    </form>
    <div class="dont">
        <a href="{{ route('register') }}">
            don't have an account ?
        </a>
    </div>

</main>
@endsection
