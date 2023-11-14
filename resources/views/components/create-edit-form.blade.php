@props(['type' , 'note' => null])
<div class="modal-dialog modal-dialog-centered" style="max-width: 1200px;">
          <div class="modal-content" style="background-color: <?= $note?->bg_color?>;">
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
                                                  <select name="bg_color" class="btn-light">
                                                            @if ($note?->bg_color)
                                                            <option value="{{$note?->color}}" style="background-color: <?= $note?->bg_color ?>;"  selected></option>
                                                            @endif
                                                            <!-- <option value="#fff" style="background-color: #fff;" selected>Defult</option> -->
                                                            <option value="#FAAFA8" style="background-color: #FAAFA8;">Coral</option>
                                                            <option value="#F39F76" style="background-color: #F39F76;">Peach</option>
                                                            <option value="#FFF8B8" style="background-color: #FFF8B8;">Sand</option>
                                                            <option value="#E2F6D3" style="background-color: #E2F6D3;">Mint</option>
                                                            <option value="#B4DDD3" style="background-color: #B4DDD3;">Sage</option>
                                                            <option value="#D4E4ED" style="background-color: #D4E4ED;">Fog</option>
                                                            <option value="#AECCDC" style="background-color: #AECCDC;">Storm</option>
                                                            <option value="#D3BFDB" style="background-color: #D3BFDB;">Dusk</option>
                                                            <option value="#F6E2DD" style="background-color: #F6E2DD;">Blossom</option>
                                                            <option value="#E9E3D4" style="background-color: #E9E3D4;">Clay</option>
                                                            <option value="#EFEFF1" style="background-color: #EFEFF1;">Chalk</option>
                                                            <!-- Coral Peach Sand Mint Sage Fog Storm Dusk Blossom Clay Chalk -->
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