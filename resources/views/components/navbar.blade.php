    <nav class="navbar navbar-dark bg-dark p-2">
    <div class="container">
        <a class="navbar-brand fw-bolder fs-3" href="/">Short Note</a>
        
        <div class="d-flex">
            @if (auth()->check())
            <button id="viewBtn" type="button" class="btn btn-dark fw-bolder fs-4 fa-solid fa-bars"></button>
            <h3 class="nav-link link-light">{{auth()->user()->name}}</h3>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-light btn-link fw-bolder fs-5 mt-1">Logout</button>
            </form>
            @endif
        </div>
    </div>
</nav>