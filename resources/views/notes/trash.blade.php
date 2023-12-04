<x-layout>
          <section class="container text-left p-4" id="notes">
                    <a class="btn btn-dark fs-5" href="/"><i class="fa-solid fa-circle-arrow-left"></i>  Back</a>
                    <h4 class="text-secondary text-center fw-bold ms-2">Trash</h4>
                    <div class="row d-flex">
                              @forelse ($notes as $note)
                              <div id="notesContainer" class="mb-4 col-md-4">
                                        <div class="card" style="border-radius: 10px; background-color: <?= $note?->bg_color ?>;">
                                                  <div class="card-body">
                                                            <div class="d-flex justify-content-between">
                                                                      <h3 class="card-title">{{$note?->title}}</h3>
                                                                      <form action="/trash/{{$note->id}}/restore" method="POST">
                                                                                @csrf
                                                                                <button type="submit" class="btn border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Restore">
                                                                                          <i class="fa-solid fa-trash-arrow-up fs-4"></i>
                                                                                </button>
                                                                      </form>
                                                            </div>
                                                            <p class="card-text border-top border-1 border-dark pt-1">
                                                                      {!!$note?->body!!}
                                                            </p>
                                                            <div class="d-flex justify-content-end">
                                                                      <form action="/trash/{{$note?->id}}/delete" method="POST">
                                                                                @method('delete')
                                                                                @csrf
                                                                                <button type="submit" class="btn border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Delete permanently">
                                                                                          <i class="fa-solid fa-trash fs-4"></i>
                                                                                </button>
                                                                      </form>
                                                            </div>
                                                  </div>
                                        </div>
                              </div>
                              @empty
                              <h5 class="text-center">no notes found in trash .......</h5>
                              @endforelse
                    </div>
          </section>
</x-layout>