@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="css/editProfile.css">
@endsection

@section('top-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jic/2.0.2/JIC.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@endsection

@section('title')
<title>Profile</title>
@endsection

@section('body')
<main >
    <div class="side-menu">
        @include('blade.profile.edit.sideMenu')
    </div>
    <div class="tab">
        <!-- User -->
        <form id="user-tab" class="card" action="" method="POST">
            @csrf
            <div class="container">
                <h4>User</h4>
                <div class="row">
                    <label for="name">name</label>
                    <input name="name" type="text" placeholder="name" value="{{ Auth()->user()->name }}" autocomplete="off" onkeyup="submitUserBtn()">
                </div>
                <div class="row">
                    <label for="email">email</label>
                    <input type="email" placeholder="email" value="{{ Auth()->user()->email }}" autocomplete="off" disabled>
                </div>
                <div class="row">
                    <label for="username">what should we name you</label>
                    <input name="nickname" type="text" placeholder="username" value="{{ Auth()->user()->profile->nickname }}" autocomplete="off" onkeyup="submitUserBtn()">
                </div>
                <div class="row-pic">
                    <div class="image-container">
                        <img id="source_img" src="{{ Auth()->user()->profile_photo_path != null ? Auth()->user()->profile_photo_path : 'images/profile.svg' }}" alt="dev-1954">
                    </div>
                    <label for="input_image">Choose picture</label>
                    <input type="file" id="input_image" accept="image/*" onchange="previewFile(); submitUserBtn()" hidden>
                    <input name="image" type="text" id="resultImage"  hidden>
                </div>
            </div>
            <div id="user-submit" class="submit">
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
                    <input name="url" type="text" placeholder="url" value="" onkeyup="submitDetailBtn()">
                </div>
                <div class="row">
                    <label for="location">location</label>
                    <input name="location" type="text" placeholder="location" value="" onkeyup="submitDetailBtn()">
                </div>
                <div class="row">
                    <label for="username">username</label>
                    <input name="username" type="email" placeholder="username" value="" onkeyup="submitDetailBtn()">
                </div>
                <div class="row">
                    <label for="bio">bio</label>
                    <textarea id="textarea-detail" name="bio" id="bio" rows="5" maxlength="300" onkeyup="submitDetailBtn()"></textarea>
                    <div id="the-count-detail">
                        <span id="current-detail">0</span>
                        <span id="maximum-detail">/ 300</span>
                    </div>
                </div>
            </div>
            <div id="detail-submit" class="submit">
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
                    <textarea name="learning" id="learning" cols="30" rows="5" onkeyup="submitSkillBtn()"></textarea>
                    <span>What are you learning right now? What are the new tools and languages you're picking up right now?</span>

                </div>
                <div class="row">
                    <label for="skills">Skills/Languages</label>
                    <input name="skills" type="text" placeholder="skills" value="" onkeyup="submitSkillBtn()">
                </div>
                <div class="row">
                    <label for="username">username</label>
                    <input name="username" type="email" placeholder="username" value="" onkeyup="submitSkillBtn()">
                </div>
            </div>
            <div id="skill-submit" class="submit">
                <button type="submit">Save User Information</button>
            </div>
        </form>
    </div>
</main>
<style>
    #user-submit,
    #detail-submit,
    #skill-submit {
        display: none;
    }

</style>
<script>

    function submitUserBtn() {
        document.getElementById('user-submit').style.display = 'block';
    }

    function submitDetailBtn() {
        document.getElementById('detail-submit').style.display = 'block';
    }

    function submitSkillBtn() {
        document.getElementById('skill-submit').style.display = 'block';
    }

    function previewFile() {
        document.getElementById("resultImage").required = true;
        var preview = document.getElementById('source_img');

        preview.style.opacity = 1;
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;

            setTimeout(myFunction(), 2000);

        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }

    function myFunction(){
        var source_img = document.getElementById("source_img");
        var quality =  50,
        output_format = 'jpg';
        document.getElementById("resultImage").value = jic.compress(source_img,quality,output_format).src;
    };


    $('textarea').on('input', function () {
            this.style.height = 'auto';

            this.style.height = (this.scrollHeight) + 'px';
    });

    $('#textarea-detail').keyup(function() {

        var characterCount = $(this).val().length,
            current = $('#current-detail'),
            maximum = $('#maximum-detail'),
            theCount = $('#the-count-detail');

        current.text(characterCount);

        /*This isn't entirely necessary, just playin around*/
        if (characterCount < 70) {
            current.css('color', '#666');
        }
        if (characterCount > 70 && characterCount < 90) {
            current.css('color', '#6d5555');
        }
        if (characterCount > 90 && characterCount < 100) {
            current.css('color', '#793535');
        }
        if (characterCount > 100 && characterCount < 120) {
            current.css('color', '#841c1c');
        }
        if (characterCount > 120 && characterCount < 139) {
            current.css('color', '#8f0001');
        }

        if (characterCount >= 140) {
            maximum.css('color', '#8f0001');
            current.css('color', '#8f0001');
            theCount.css('font-weight','bold');
        } else {
            maximum.css('color','#666');
            theCount.css('font-weight','normal');
        }
    });


</script>
@endsection
