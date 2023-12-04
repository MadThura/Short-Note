@props(['type' , 'note' => null])
@php
$colors = [
'Default' => '#fff',
'Coral' => '#FAAFA8',
'Peach' => '#F39F76',
'Sand' => '#FFF8B8',
'Mint' => '#E2F6D3',
'Sage' => '#B4DDD3',
'Fog' => '#D4E4ED',
'Storm' => '#AECCDC',
'Dusk' => '#D3BFDB',
'Blossom' => '#F6E2DD',
'Clay' => '#E9E3D4',
'Chalk' => '#EFEFF1'
];
@endphp
<div class="modal-dialog modal-dialog-centered" style="max-width: 1200px;">
          <div class="modal-content" style="background-color: <?= $note?->bg_color ?>;">
                    <form action="/notes/{{$type === 'create' ? 'create' :  $note->id.'/update'}}" method="POST">
                              @csrf
                              <div class="modal-header">
                                        <h1 class="modal-title fs-5">{{$type === 'create' ? "Create" : "Edit"}} note</h1>
                                        <a href="/" type="button" class="btn-close"></a>
                              </div>
                              <div class="modal-body">
                                        <div class="mb-0 p-0">
                                                  <input name="title" value="{{$note?->title}}" class="form-control fs-4 border-0" placeholder="Title" style="height: 50px; resize: none; outline: none;"></input>
                                        </div>
                                        <div class="m-0 p-3 d-flex">
                                                  <h5 class="me-2">Background color</h5>
                                                  <select name="bg_color" class="btn-light" style="background-color: <?= $note?->bg_color ?>;">
                                                            @foreach ($colors as $colorName => $colorCode)
                                                            <option value="{{$colorCode}}" style="background-color: <?= $colorCode ?>;" {{$note?->bg_color === $colorCode ? "selected" : ''}}>{{$colorName}}</option>
                                                            @endforeach
                                                  </select>
                                        </div>
                                        <div class="mb-3 p-0 border-top border-3 border-dark">
                                                  <textarea id="mytextarea" name="body" class="form-control fs-5 border-0" placeholder="Take a note...." style="height: 300px; resize: none; outline: none;">{{$note?->body}}</textarea>
                                        </div>
                              </div>
                              <div class="modal-footer">
                                        <a href="/" type="button" class="btn btn-light">cancel</a>
                                        <button type="submit" class="btn btn-dark">{{$type === 'create' ? "Done" : "Update"}}</button>
                              </div>
                    </form>
          </div>
</div>