<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="/">
                <h1 class="title"><span class="fa fa-fire"></span> GAS POINT</h1>
            </a>

            <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>

            <span class="nav-toggle">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>

        <div class="navbar-menu">
            <div class="navbar-start"></div>
            <div class="navbar-end">
                @if(auth()->check())
                    <a class="navbar-item" href="{{ route('admin.show') }}" >
                        {{ auth()->user()->name }}
                    </a>
                    <a href="#" class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        Sign out
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>

<form id="logout" action="{{ route('logout') }}" method="POST" class="is-hidden">
    {{ csrf_field() }}
</form>