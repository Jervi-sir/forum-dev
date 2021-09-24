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
        <!-- User -->
        <form id="user-tab" class="card" action="" method="POST">
            @csrf
            <div class="container">
                <h4>User</h4>
                <div class="row">
                    <label for="name">name</label>
                    <input name="name" type="text" placeholder="name" value="{{ Auth()->user()->name }}" autocomplete="off">
                </div>
                <div class="row">
                    <label for="email">email</label>
                    <input name="email" type="email" placeholder="email" value="{{ Auth()->user()->email }}" autocomplete="off">
                </div>
                <div class="row">
                    <label for="username">username</label>
                    <input name="username" type="text" placeholder="username" value="{{ Auth()->user()->name }}" autocomplete="off">
                </div>
                <div class="row-pic">
                    <img src="images/profile.svg" alt="" width="50px">
                    <label for="pic">Choose picture</label>
                    <input name="pic" type="file" id="pic" value="" hidden>
                </div>
            </div>
            <div class="submit">
                <button type="submit">Save User Information</button>
            </div>
        </form>

        <!-- Details -->
        <form id="detail-tab" action="" method="POST">
            @csrf
            <div class="container">
                <h4>Details</h4>
                <div class="row">
                    <label for="url">your website url</label>
                    <input name="url" type="text" placeholder="url" value="">
                </div>
                <div class="row">
                    <label for="location">location</label>
                    <input name="location" type="text" placeholder="location" value="">
                </div>
                <div class="row">
                    <label for="username">username</label>
                    <input name="username" type="email" placeholder="username" value="">
                </div>
                <div class="row">
                    <label for="bio">bio</label>
                    <textarea name="bio" id="bio" rows="10"></textarea>
                </div>
            </div>
            <div class="submit">
                <button type="submit">Save Details Information</button>
            </div>
        </form>

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
