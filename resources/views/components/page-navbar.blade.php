<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('home')}}">Ticketing System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('home') ? 'active': ''}}" aria-current="page" href="{{route('home')}}">Home</a>
                </li>

                @role('admin')
                <li class="nav-item">
                    <a class="nav-link {{request()->routeIs('admin.tickets.index') ? 'active': ''}}" href="{{route('admin.tickets.index')}}">
                        All Tickets
                    </a>
                </li>
                @endrole
            </ul>
            <div class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('tickets.create') ? 'active': ''}}" href="{{route('tickets.create')}}">Open a Ticket</a>
                        </li>

                        <li class="nav-item btn-item">
                            <form action="/logout" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn-blank">Log Out</button>
                            </form>
                        </li>
                    @endauth

                    @guest
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('login') ? 'active': ''}}" href="{{route('login')}}">
                                Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('register') ? 'active': ''}}" href="{{route('register')}}">
                                Sign Up
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
</nav>
