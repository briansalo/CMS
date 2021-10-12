@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <img src="/storage/{{$users->image}}" alt="" width="50px" height="50px" class="rounded-circle">My Profile</div>
        <div class="card-body">                    
             <form action="user_update" method="POST" enctype="multipart/form-data">
             @csrf
                 <div class="form-group">
                     <label for="name">Name</label>
                     <input type="text" id="title" class="form-control" name="name" value="{{$users->name}}">
                </div>
                <div class="form-group">
                     <label for="about">About</label>
                     <textarea id="about" cols="5" rows="5" class="form-control" name="about">{{$users->about}}</textarea>
                </div>
                <div class="form-group ">
                    <label for="image">Update Profile</label>
                    <input type="file" id="image" class="form-control" name="image">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm">
                        Update Profile
                    </button>
                </div>
            </form> 
        </div>
</div>
@endsection
   