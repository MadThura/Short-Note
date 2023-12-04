@props(['note'])
<div class="card" style="border-radius: 10px; background-color: <?= $note?->bg_color ?>;">
    <div class="card-body">
        <div class="d-flex justify-content-between">
            <h3 class="card-title">{{$note?->title}}</h3>
            <form action="/notes/{{$note->id}}/pin" method="POST">
                @csrf
                <button type="submit" class="btn border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="{{$note->pin?'unpin':'pin'}}">
                    @if ($note->pin)
                    <i class="fa-solid fa-thumbtack fs-4 text-danger"></i>
                    @else
                    <i class="fa-solid fa-thumbtack fs-4"></i>
                    @endif
                </button>
            </form>
        </div>
        <p class="card-text border-top border-1 border-dark pt-1">
            {!!$note?->body!!}
        </p>
        <div class="d-flex justify-content-end">
            <form action="/notes/{{$note?->id}}/move_to_trash" method="POST">
                @method('delete')
                @csrf
                <button type="submit" class="btn border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Move to trash">
                    <i class="fa-solid fa-trash fs-4"></i>
                </button>
            </form>
            <div data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Edit">
                <a href="/notes/{{$note->id}}/edit" type="button" class="btn border-0">
                    <i class="fa-solid fa-pen-to-square fs-4"></i>
                </a>
            </div>
        </div>
    </div>
</div>