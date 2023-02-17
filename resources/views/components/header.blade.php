<header class="header">
    <div class="logo">
        <img src="https://i.pinimg.com/originals/b2/38/01/b238018c0a4861898f3f44f78ce3eb2c.jpg" />
    </div>
    <nav>
        <a class="link" href="/">Home</a>
        @guest()
            <a class="link" href="/auth">Auth</a>
            <a class="link" href="/reg">Register</a>
        @endguest
        @auth()
            <a class="link" href="/exit">Exit</a>
        @endauth
    </nav>
</header>
