@extends('adminLte.main')

@section('title' , 'create New User')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User <h4>{{$user->name}}</h4></div>
                <div class="card-body">
                    <form action="{{route('users.store')}}" method="post">
                        @csrf
{{--                        @method('PATCH')--}}
                        <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Full Name">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                            @if ($errors->has('name'))
                                <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                            @if ($errors->has('email'))
                                <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @if ($errors->has('password'))
                                <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                            @endif
                        </div>

                        <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                            @endif
                        </div>
                        <div class="table-bordered margin">
                            <p class="login-box-msg">His Role</p>
                            @foreach($roles as $role)
                                <div class="form-radio">
                                    <input type="radio" name="roles[]" value="{{$role->id}}"
                                           @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                    <label>{{$role->name}}</label>
                                </div>
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
