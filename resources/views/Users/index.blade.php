@extends('adminLte.main')

@section('title' , ' Users')

@section('content')

<div class="card-body">
    <div class="card-header bg-white font-24 text-center">
        <a href="{{route('users.create')}}"><button type="button" class="btn btn-secondary float-left">Add New User</button> </a>
        Users
        <div class="float-right font-21 btn card"> All Users {{$count}}</div>
    </div>
    <div class="card">
     <table class="table">
         <thead class="thead-dark">
         <tr>
             <th scope="col">#</th>
             <th scope="col">Name</th>
             <th scope="col">Email</th>
             <th scope="col">Role</th>
             @can('edit-users')
             <th scope="col">Action</th>
             @endcan
         </tr>
         </thead>
         <tbody>
         @foreach($users as $user)
             <tr>
                 <th scope="row">{{$user->id}}</th>
                 <td> {{$user->name}}</td>
                 <td>{{$user->email}}</td>
                 <td>{{implode(' : ' , $user->roles()->get()->pluck('name')->toArray())}}</td>
                 @can('edit-users')
                 <td>
                     <a href="{{route('users.edit' , $user)}}"><button type="button" class="btn btn-primary"><i class="fas fa-user-cog"> Edit </i></button> </a>
                     <form action="{{route('users.destroy' , $user)}}" method="post" class="float-right">
                         @csrf
                         @method('DELETE')
                         <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure You Want To Delete This User?')"><i class="fa fa-trash"> </i> Delete </button>
                     </form>
                 </td>
                 @endcan
             </tr>
         @endforeach
         </tbody>
     </table>
 </div>
</div>
@endsection
