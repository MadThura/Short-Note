
@props(['notes', 'pinNotes', 'otherNotes'])
<section class="container text-left p-4" id="notes">
    
    @if (sizeof($pinNotes))
    <h4 class="text-secondary fw-bold ms-2">Pin</h4>
    <div class="row d-flex">
        @foreach ($pinNotes as $note)
        <div id="notesContainer" class="mb-4 col-md-4">
            <x-note-card :note="$note" />
        </div>
        @endforeach
    </div>
    @if (sizeof($otherNotes)) 
    <h4 class="text-secondary fw-bold ms-2">Others</h4>
    <div class="row d-flex">
        @foreach ($otherNotes as $note)
        <div id="notesContainer" class="mb-4 col-md-4">
            <x-note-card :note="$note" />
        </div>
        @endforeach
    </div>
    @endif
    @else
    <h4 class="text-secondary fw-bold ms-2">All</h4>
    <div class="row d-flex">
        @forelse ($notes as $note)
        <div id="notesContainer" class="mb-4 col-md-4">
            <x-note-card :note="$note" />
        </div>
        @empty
        <p class="text-center">no blogs found....</p>
        @endforelse
    </div>
    @endif
</section>