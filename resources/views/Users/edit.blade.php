@extends('adminLte.main')

@section('title' , ' Users')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit User <h4>{{$user->name}}</h4></div>
            <div class="card-body">
                <form action="{{route('users.update' , $user)}}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
                        <input id="name" type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Name">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                        <input type="email" class="form-control" name="email" value="{{$user->email }}" placeholder="Email">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="table-bordered margin">
                        @foreach($roles as $role)
                            <div class="form-radio">
                                <input type="radio" name="roles[]" value="{{$role->id}}"
                                @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                <label>{{$role->name}}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
