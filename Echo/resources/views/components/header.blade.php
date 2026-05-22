<header>

    @if (Auth::check())
    <a href="/">Home</a>
        <a href="/chat">Chat</a>
        <a href="/logout">Logout</a>
    @else
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    @endif
</header>