<nav class="navbar navbar-dark bg-dark p-2">
    <div class="container">
        <a class="navbar-brand fw-bolder fs-3" href="/">Short Note</a>
        <div class="col-md-6 mx-auto">
            <form action="/" class="my-3">
                <div class="input-group mb-3">
                    <input type="hidden" name="category" value="">
                    <input type="hidden" name="author" value="">
                    <input value="" name="search" style="height: 40px;" type="text" autocomplete="false" class="form-control rounded-start" placeholder="Search notes..." />
                    <button class="input-group-text btn btn-light" id="basic-addon2" type="submit">
                        Search
                    </button>
                </div>
            </form>
        </div>
        <div class="d-flex">
            <div class="dropdown">
                <a class="btn btn-dark dropdown-toggle fw-bolder fs-5" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Notes
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item link-dark fw-bolder fs-5" href="#">Others</a></li>
                    <li><a class="dropdown-item link-dark fw-bolder fs-5" href="#">Pinned</a></li>
                </ul>
            </div>
            <button id="viewBtn" type="button" class="btn btn-dark fw-bolder fs-4 fa-solid fa-bars"></button>
            <a href="" class="nav-link link-light fw-bolder fs-5">Name</a>
            <!-- <a href="/login" class="nav-link link-light fw-bolder fs-5">Login</a>
            <a href="/register" class="nav-link link-light fw-bolder fs-5">Register</a> -->
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-light fw-bolder fs-5">Logout</button>
            </form>
        </div>
    </div>
</nav>