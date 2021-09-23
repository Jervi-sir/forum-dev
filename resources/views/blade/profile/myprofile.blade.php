@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="css/profile.css">
@endsection

@section('top-script')

@endsection

@section('title')
<title>Profile</title>
@endsection


@section('body')
<main >
    <div class="profile">
        <div class="top">
            <div class="image">
                <img src="images/profile.svg" alt="">
            </div>
            <div class="details">
                <div class="edit-profile">
                    <button>Edit Profile</button>
                </div>
                <div class="username">
                    {{ $user->name }}
                </div>
                <div class="bio">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit nemo ea ad consequuntur, dicta architecto! Sequi doloremque optio quidem asperiores dolorum, nihil, eveniet rem magni dolores magnam dolorem vero sint?
                </div>
                <div class="location-joined">
                    <div class="location">
                        <img src="images/location.svg" alt="">
                        <span>location</span>
                    </div>
                    <div class="joined">
                        <span>
                            Joined at {{ $user->created_at->isoFormat('MMM DD YYYY') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="line-separator">
        </div>
        <div class="bottom">
            <div class="find-me">
                <span>find me at</span>
            </div>
            <div class="socials">
                <ul>
                    <li><a href=""><img src="images/github.svg" alt=""></a></li>
                    <li><a href=""><img src="images/linkedin.svg" alt=""></a></li>
                    <li><a href=""><img src="images/youtube.svg" alt=""></a></li>
                    <li><a href=""><img src="images/facebook.svg" alt=""></a></li>
                    <li><a href=""><img src="images/twitter.svg" alt=""></a></li>
                    <li><a href=""><img src="images/dribbble.svg" alt=""></a></li>
                    <li><a href=""><img src="images/behance.svg" alt=""></a></li>
                    <li><a href="" class="website">website.com</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="posts">
        <div class="totals">
            <a href="">{{ $user->articles->count() }}<span> post published</span> </a>
            <a href="">1 <span>post drafted</span> </a>
        </div>
        @foreach ($user->articles as $article)
        <div class="card">
            <div class="status published">
                published
            </div>
            <div class="content">
                <div class="image">
                    <img src="images/profile.svg" alt="">
                </div>
                <div class="details">
                    <div class="owner">
                        <div class="created">
                            <span>{{ $article->created_at->isoFormat('MMM DD YYYY')}}</span>
                        </div>
                    </div>
                    <div class="post">
                        <h4>{{ $article->title }}</h4>
                        <div class="tags">
                            <span>javascript</span>
                            <span>python</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="stats">
                <ul>
                    <li>
                        <img src="images/heartSmall.svg" class="small" alt="">
                        <span> 0 </span>
                    </li>
                    <li>
                        <img src="images/commentSmall.svg" class="small" alt="">
                        <span> 0 </span>
                    </li>
                    <li>
                        <img src="images/saveSmall.svg" class="small" alt="">
                        <span> 0 </span>
                    </li>
                </ul>
            </div>
        </div>
        @endforeach

    </div>
</main>
@endsection
