@props(['type' , 'note' => null])
<div class="modal-dialog modal-dialog-centered" style="max-width: 1200px;">
          <div class="modal-content">
                    <form action="/notes/{{$type === 'create' ? 'create' :  $note->id.'/update'}}" method="POST">
                              @csrf
                              <div class="modal-header">
                                        <h1 class="modal-title fs-5">{{$type === 'create' ? "Create" : "Edit"}} note</h1>
                                        <a href="/" type="button" class="btn-close"></a>
                              </div>
                              <div class="modal-body">
                                        <div class="mb-0 p-0">
                                                  <input name="title" value="{{$note?->title}}" class="form-control fs-4 border-0" placeholder="Title" style="height: 50px; resize: none; outline: none;" require></input>
                                        </div>
                                        <div class="mb-3 p-0 border-top border-3 border-dark">
                                                  <textarea id="mytextarea" name="body" class="form-control fs-5 border-0" placeholder="Take a note...." style="height: 300px; resize: none; outline: none;" require>{{$note?->body}}</textarea>
                                        </div>
                              </div>
                              <div class="modal-footer">
                                        <a href="/" type="button" class="btn btn-light">cancel</a>
                                        <button type="submit" class="btn btn-dark">{{$type === 'create' ? "Done" : "Update"}}</button>
                              </div>
                    </form>
          </div>
</div>