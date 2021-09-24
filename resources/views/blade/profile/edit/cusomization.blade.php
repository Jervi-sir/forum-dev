@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="css/editProfile.css">
@endsection

@section('top-script')

@endsection

@section('title')
<title>Profile</title>
@endsection


@section('body')
<main >
    <div class="side-menu">
        @include('blade.profile.edit.sideMenu')
    </div>
    <div class="tab ">
        <!-- Skills  -->
        <form id="skill-tab" action="" method="POST">
            @csrf
            <div class="container">
                <h4>Skills and what I m currently doing</h4>
                <div class="row">
                    <label for="learning">Currently Learning</label>
                    <textarea name="learning" id="learning" cols="30" rows="10"></textarea>
                    <span>What are you learning right now? What are the new tools and languages you're picking up right now?</span>
                </div>
                <div class="row">
                    <label for="skills">Skills/Languages</label>
                    <input name="skills" type="text" placeholder="skills" value="">
                </div>
                <div class="row">
                    <label for="username">username</label>
                    <input name="username" type="email" placeholder="username" value="">
                </div>
            </div>
            <div class="submit">
                <button type="submit">Save User Information</button>
            </div>
        </form>

    </div>
</main>
@endsection
