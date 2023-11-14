<section class="container my-4" id="">
    <div class="d-flex justify-content-center">
        <form action="/" style="width: 540px;">
            <div class="input-group">
                @if (request('sortBy'))
                <input type="hidden" name="sortBy" value="{{request('sortBy')}}">
                @endif
                <input value="{{request('search') ? request('search') : ''}}" name="search" style="height: 40px;" type="text" autocomplete="false" class="form-control rounded-start" placeholder="Search notes..." />
                <button class="input-group-text btn btn-dark" id="basic-addon2" type="submit" @if(!auth()->check())
                    disabled
                    @endif>
                    Search
                </button>
                @if (request('search'))
                <a class="btn btn-dark ms-2" href="/{{request('sortBy') ? '?sortBy='.request('sortBy') : ''}}">clear</a>
                @endif
            </div>
        </form>
        <div class="dropdown ms-2">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                {{request('sortBy') ? request('sortBy') : "Latest"}}
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/?sortBy=Latest{{request('search') ? '&search='.request('search') : '' }}">Latest</a></li>
                <li><a class="dropdown-item" href="/?sortBy=Oldest{{request('search') ? '&search='.request('search') : '' }}">Oldest</a></li>
            </ul>
        </div>
    </div>
</section>