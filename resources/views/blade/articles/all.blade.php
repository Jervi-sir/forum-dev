@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="css/main.css">
@endsection

@section('top-script')

@endsection

@section('title')
<title>DEv - 1954</title>
@endsection


@section('body')
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
<main>
    <div class="left">
        <div class="links">
            <h4>Dev Community</h4>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Saved</a></li>
                <li><a href="">Videos</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
        <div class="link-separator">
        </div>
        <div class="links">
            <h4>Tags</h4>
            <ul>
                <li><a href="">Javascript</a></li>
                <li><a href="">React</a></li>
                <li><a href="">Laravel</a></li>
                <li><a href="">Docker</a></li>
                <li><a href="">UI/UX</a></li>
            </ul>
        </div>
    </div>
    <div class="middle">
        <div class="header not-small">
            <div class="title">
               <span>Post</span>
            </div>
            <div class="tabs">
                <ul>
                    <li><a href="">Feed</a></li>
                    <li><a href="">Week</a></li>
                    <li><a href="">Month</a></li>
                    <li><a href="">Lasted</a></li>
                </ul>
            </div>
        </div>
        <div class="header small">
            <div class="title">
                <span>Post</span>
            </div>
            <select name="" id="">
                <option value="">Feed</option>
                <option value="">Week</option>
                <option value="">Month</option>
                <option value="">Lasted</option>
            </select>
        </div>
        @foreach ($articles as $article)
        <div class="post">
            <a href="{{ route('article.show', ['slug' => $article->slug ]) }}" class="hidden-link-post">{{ $article->user->first()->name }}</a>
            <div class="image">
                <img src="{{ $article->thumbnail }}" alt="">
            </div>
            <div class="details">
                <div class="right-details">
                    <div class="top">
                        <div class="user">
                            <img src="images/profile.svg" alt="">
                        </div>
                        <div class="some-details">
                            <div class="name">{{ $article->user->first()->name }}</div>
                            <div class="created">{{ $article->created_at->isoFormat('MMM DD')  }}</div>
                        </div>
                    </div>
                    <div class="title">
                        <h2>{{ $article->title }}</h2>
                    </div>
                    <div class="tags">
                        <span>Javascript</span>
                        <span>Python</span>
                        <span>Django</span>
                    </div>
                    <div class="action">
                        <div class="stats">
                            <div class="heart">
                                <img src="images/heart.svg" class="not-small" alt="">
                                <img src="images/heartSmall.svg" class="small" alt="">
                                <span class="count">28</span>
                                <span class="word">reactions</span>
                            </div>
                            <div class="comment">
                                <img src="images/comment.svg" class="not-small" alt="">
                                <img src="images/commentSmall.svg" class="small" alt="">
                                <span class="count">18</span>
                                <span class="word">comments</span>
                            </div>
                        </div>
                        <button class="save">
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
    <div class="right">
        <div class="card with-padding">
            <h5>Welcome to</h5>
            <p><span>Dev forum </span> is a community dedicated to discovering and discussing open source community</p>
        </div>
        <div class="card new-members">
            <h5>Welcome to new members</h5>
            <ul>
                <li>new Members</li>
                <li>new Members</li>
                <li>new Members</li>
                <li>new Members</li>
            </ul>
        </div>
    </div>
</main>
@endsection
