<nav class="navbar navbar-dark bg-dark p-2">
    <div class="container">
        <a class="navbar-brand fw-bolder fs-3" href="/">Short Note</a>
        <div class="col-md-6 mx-auto">
            <form action="/" class="my-3">
                <div class="input-group mb-3">
                    <!-- <input type="hidden" name="category" value="">
                    <input type="hidden" name="author" value=""> -->
                    <input value="{{request('search') ? request('search') : ''}}" name="search" style="height: 40px;" type="text" autocomplete="false" class="form-control rounded-start" placeholder="Search notes..." />
                    <button class="input-group-text btn btn-light" id="basic-addon2" type="submit" @if(!auth()->check())
                        disabled
                        @endif>
                        Search
                    </button>
                </div>
            </form>
        </div>
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