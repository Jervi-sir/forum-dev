<header>
    <div class="logo">
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('images/logo.svg')}}" alt="">
        </a>
        <span>Dev - <small style="font-size: 15px;">1954.</small></span>

    </div>
    <div class="search">
        <div class="container">
            <input type="text" placeholder="Search...">
            <img src="{{ asset('images/search.svg')}}" alt="">
        </div>
    </div>
    <div class="action">
        @guest
        <a class="button dark-blue" href="{{ route('register') }}">
            Create Account
        </a>
        <a class="login-link" href="{{ route('login') }}">
            Log in
        </a>
        @endguest
        @auth
        <a class="button dark-blue" href="{{ route('article.create') }}">
            Create a Post
        </a>
        <a class="login-link" href="{{ route('profile.view') }}">
            <img src="{{ asset('images/profile.svg')}}" alt="" width="50px">
        </a>
        @endauth
    </div>
    <div class="wrapper-menu">
        <div class="line-menu half start"></div>
        <div class="line-menu"></div>
        <div class="line-menu half end"></div>
    </div>
</header>

<div class="menu-mobile transition-up">
    <div class="search-mobile">
        <input type="text" placeholder="Search...">
        <img src="{{ asset('images/search.svg')}}" alt="">
    </div>
    <div class="row">
        <a href="{{ route('register') }}">Create an Account</a>
    </div>
    <div class="row">
        <a href="">Home</a>
        <span> / </span>
        <a href="">Videos</a>
    </div>
    <div class="row">
        <a href="">About</a>
        <span> / </span>
        <a href="">Contact</a>
    </div>

</div>

<script>
    var wrapperMenu = document.querySelector('.wrapper-menu');
    var elem = document.querySelector(".menu-mobile");
    var main = document.querySelector("main");

    wrapperMenu.addEventListener('click', function(){
        wrapperMenu.classList.toggle('open');
        elem.classList.toggle('transition-up');
        main.classList.toggle('up');
        /*
        if(wrapperMenu.classList.contains("open")) {
            document.body.style.overflow = 'hidden';
        }
        else {
            document.body.style.overflow = 'auto';
        }
        */
    })
</script>
