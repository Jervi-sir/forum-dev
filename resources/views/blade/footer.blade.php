<footer>
    <p>
        <a href="{{ route('welcome') }}">DEV</a>
         – A social network for software developers. With you in every step of your journey.
    </p>
    <p>
        Built as an open source website that helps DEV communities.
        Made with love and Laravel. 2Ks  © 2021.
    </p>
    <!--
    <ul>
        <li>
            <a href="">
                <img src="images/facebook.svg" alt="">
            </a>
        </li>
        <li>
            <a href="">
                <img src="images/instagram.svg" alt="">
            </a>
        </li>
        <li>
            <a href="">
                <img src="images/facebook.svg" alt="">
            </a>
        </li>
    </ul>
-->
</footer>

<style>
footer a {
    text-decoration: none;
    color: white;
    font-weight: bold
}
footer {
    background: rgba(0, 0, 0, 0.3);
    padding: 4rem;
}
footer p {
    text-align: center;
    margin-bottom: 1rem;
    font-size: var(--size-regular);
    font-weight: 100;
}
footer ul {
    display: flex;
    list-style: none;
    gap: 3rem;
    align-items: center;
    justify-content: center;
}
</style>
