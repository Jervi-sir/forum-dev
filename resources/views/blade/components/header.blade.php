<header>
    <div class="content">
        <div class="logo">
            <a href="{{ route('welcome') }}">
                <img src="{{ asset('images/logo.svg')}}" alt="">
            </a>
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

            <div class="dropdown">
                <img src="{{ asset('images/profile.svg')}}" onclick="dropDown()" class="dropbtn"  alt="" >
                <div id="myDropdown" class="dropdown-content">
                    <a class="{{ (request()->is('profile')) ? 'active' : '' }}" href="{{ route('profile.view') }}">
                       {{Auth()->user()->name}}
                    </a>
                    <hr>
                    <a href="#">Create Post</a>
                    <a href="#">Saved Posts</a>
                    <a href="#">Setting</a>
                    <hr>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>
            @endauth
        </div>
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

    function dropDown() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            console.log(1);
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
    }

</script>

