@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="../css/auth.css">
@endsection

@section('top-script')

@endsection

@section('title')
<title>Register</title>
@endsection


@section('body')
<main >
    <h1>Welcome to Dev Community</h1>
    <h3>community of 5,235 amazing developers</h3>
    <div class="button-container">
        <a class="button-wide black" href="">
            <img src="images/github.svg" alt="">
            <span>Continue with Github</span>
        </a>
        <a class="button-wide blue" href="">
            <img src="images/twitter.svg" alt="">
            <span>Continue with Twitter</span>
        </a>
        <a class="button-wide grey" href="">
            <img src="images/google.svg" alt="">
            <span>Continue with Google</span>
        </a>
    </div>

    <div class="separator">
        <span class="line">
            <img src="images/line.svg" alt="">
        </span>
        <span>register in</span>
        <span class="line">
            <img src="images/line.svg" alt="">
        </span>
    </div>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="row">
            <label for="name">{{__('Name')}}</label>
            <input name="name" id="name" type="text" :value="old('name')" required autofocus >
        </div>
        <div class="row">
            <label for="email">{{__('Email')}}</label>
            <input name="email" id="email" type="email" :value="old('email')" required >
        </div>
        <div class="row">
            <label for="password">{{__('Password')}}</label>
            <input name="password" id="password" type="password" required autocomplete="new-password" >
        </div>
        <button class="button-wide dark-blue" type="submit">
            {{ __('Register') }}
        </button>
    </form>
    <div class="dont">
        <a href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>
    </div>

</main>
@endsection
