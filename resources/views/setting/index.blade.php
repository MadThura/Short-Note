@props(['user', 'notes'])
@php
$numOfNotes = $notes->where('trash', false)->count();
$numOfPin = $notes->where('pin', true)->where('trash', false)->count();
$numOfTrash = $notes->where('trash', true)->count();
@endphp
<x-layout>
  <section style="background-color: #eee;">
    <div class="container py-3">
      <a class="btn btn-dark fs-5 mb-2" href="/"><i class="fa-solid fa-circle-arrow-left"></i> Back</a>
      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="{{$user->photo}}" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3">{{$user->name}}</h5>
              <div class="d-flex justify-content-between text-center mt-5 mb-2">
                <div>
                  <p class="mb-2 h5">{{$numOfNotes}}</p>
                  <p class="text-muted mb-0">All Notes</p>
                </div>
                <div class="px-3">
                  <p class="mb-2 h5">{{$numOfPin}}</p>
                  <p class="text-muted mb-0">Pinned Notes</p>
                </div>
                <div>
                  <p class="mb-2 h5">{{$numOfTrash}}</p>
                  <a class="text-muted mb-0" href="/trash">
                    Trash
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card mb-4">
            <div class="card-body">
              <form action="/{{$user->id}}/profile" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <input name="name" value="{{old($user->name, $user->name)}}" class="text-muted mb-0 border-0" type="text">
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Email</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0 border-0">{{$user->email}}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Profile Picture</p>
                  </div>
                  <div class="col-sm-9">
                    <input name="photo" class="mb-0 border-0" type="file">
                    @error('photo')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <hr>
                <div class="row">
                  <h5 class="text-center mb-4">Change Password</h5>
                  <div class="col-sm-3">
                    <p class="mb-0">Old password</p>
                  </div>
                  <div class="col-sm-9">
                    <input name="oldPassword" class="mb-0 p-2 border rounded" type="password">
                    @error('oldPassword')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">New password</p>
                  </div>
                  <div class="col-sm-9">
                    <input name="password" class="mb-0 p-2 border rounded" type="password">
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Confirm password</p>
                  </div>
                  <div class="col-sm-9">
                    <input name="password_confirmation" class="mb-0 p-2 border rounded" type="password">
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <a href="/profile" type="button" class="btn btn-light">Cancel</a>
                    <button class="btn btn-primary" type="submit">Save</button>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <a href="/account-deletion/{{$user->id}}" type="button" class="btn btn-danger">Delete Account</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layout>