@extends('blade.master')

@section('top-style')
<link rel="stylesheet" href="{{ asset('css/article.css')}}">
<link rel="stylesheet" href="{{ asset('css/markdown.css')}}">


@endsection

@section('top-script')

@endsection

@section('title')
<title>Article</title>
@endsection


@section('body')
<main >
    <div class="post">
        <div class="image">
            <img src="{{ $article->thumbnail }}" alt="">
        </div>
        <div class="container">
            <div class="stats">
                <ul>
                    <li><a href="">
                        <img src="{{ asset('images/heartSmall.svg')}}" class="small" alt=""></a>
                        <span>0</span>
                    </li>
                    <li><a href="">
                        <img src="{{ asset('images/commentSmall.svg')}}" class="small" alt=""></a>
                        <span>0</span>
                    </li>
                    <li><a href="">
                        <img src="{{ asset('images/saveSmall.svg')}}" class="small" alt=""></a>
                        <span>0</span>
                    </li>
                </ul>
            </div>
            <div class="content">
                <h1>{{ $article->title }}</h1>
                <div class="details">
                    <img src="{{ asset('images/profile.svg')}}" alt="">
                    <span>{{ $article->user->first()->name }}</span>
                    <span>{{ $article->created_at->isoFormat('MMM DD')  }}</span>
                    @if($article->user->first() == Auth()->user())
                    <div class="buttons">
                        <button  class="edit">edit</button>
                        <button  class="delete">delete</button>
                    </div>
                    @endif
                </div>
                <div class="body-content">
                    {!! $text !!}
                </div>
                <div class="comments">
                    <h3>Discussion { <span>0</span> }</h3>
                    <div class="card">
                        <div class="user-image">
                            <img src="{{ asset('images/profile.svg')}}" alt="">
                        </div>
                        <div class="comment">
                            <textarea name="" id="" rows="10" placeholder="Add to the discussion"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="right">
        <div class="author">
            <div class="detail">
                <img src="{{ asset('images/profile.svg')}}" alt="">
                <div class="name">{{ $article->user->first()->name }}</div>
            </div>
            <div class="bio">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Corrupti aliquid accusan
            </div>
            <div class="location">
                <span>Location</span>
                <p>
                    Bruh location
                </p>
            </div>
            <div class="works">
                <span>Works</span>
                <p>
                    Bruh works
                </p>
            </div>
            <div class="joined">
                <span>Joined</span>
                <p>
                    March 23, 2021
                </p>
            </div>
            <div class="follow">
                <button>
                    Follow
                </button>
            </div>
        </div>
        <div class="trending">
            <h4>Trending <span>Community</span> </h4>
            <div class="item">
                <div class="image">
                    <img src="{{ asset('images/profile.svg')}}" alt="">
                </div>
                <div class="details">
                    <div class="title">TitleTitleTitleTitle</div>
                    <div class="tags">js, python</div>
                </div>
            </div>
            <div class="item">
                <div class="image">
                    <img src="{{ asset('images/profile.svg')}}" alt="">
                </div>
                <div class="details">
                    <div class="title">TitleTitleTitleTitle</div>
                    <div class="tags">js, python</div>
                </div>
            </div>
            <div class="item">
                <div class="image">
                    <img src="{{ asset('images/profile.svg')}}" alt="">
                </div>
                <div class="details">
                    <div class="title">TitleTitleTitleTitle</div>
                    <div class="tags">js, python</div>
                </div>
            </div>
            <div class="item">
                <div class="image">
                    <img src="{{ asset('images/profile.svg')}}" alt="">
                </div>
                <div class="details">
                    <div class="title">TitleTitleTitleTitle</div>
                    <div class="tags">js, python</div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
