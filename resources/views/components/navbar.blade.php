    <nav class="navbar navbar-dark bg-dark p-2">
        <div class="container">
            <a class="navbar-brand fw-bolder fs-3" href="/">Short Note</a>
            @if(auth()->check())
            <div class="d-flex">
                <button id="viewBtn" type="button" class="btn btn-dark fw-bolder fs-3 fa-solid fa-bars ms-2" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="View"></button>
                <h4 class="nav-link text-light mt-1">{{auth()->user()->name}}</h4>
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{auth()->user()->photo}}" class="rounded-circle" height="40" alt="" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li><a class="dropdown-item" href="/trash">Trash</a></li>
                        <li>
                            <form class="" action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
        </div>
    </nav>