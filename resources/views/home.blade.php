@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
   </div>
  @endif
  @if(session()->get('message'))
  <div class="alert alert-success" role="alert">
    <strong>Success: </strong>{{session()->get('message')}}
  </div>
  @endif
    <div class="row justify-content-center">

           

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}'s Profile</div>
              
                <div class="card-body">
                <div class="profile-header-img">
          <img class="rounded-circle" src="/avatars/{{ Auth::user()->avatar }} "width="200  "height="200" />
                    <!-- badge -->

                    <div class="row mb-3">
    <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar (optional)') }}</label>

    <div class="col-md-6">
        <input id="avatar" type="file" class="form-control" name="avatar">
    </div>
</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif
                    <form action="{{route('home')}}" method="POST">
                    @csrf
                       <div class="form-group">
                           <label for="name"><strong>Name:</strong></label>
                           <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->name}}">
                       </div>
                        <div class="form-group">
                           <label for="email"><strong>Email:</strong></label>
                           <input type="text" class="form-control" id ="email" value="{{Auth::user()->email}}" name="email">
                       </div>
                       <br>
                        <button class="btn btn-primary" type="submit">Update Profile</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
