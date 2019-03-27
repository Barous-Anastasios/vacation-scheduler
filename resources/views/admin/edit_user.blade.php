@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>CREATE USER</h2>
        <form action="/user/edit" method="post">
            <input type="hidden" name="id" value="{{$user->id}}">
            {{csrf_field()}}
            <label for="">FIRST NAME</label>
            <input value="{{$user->name}}" type="text" name="name">

            <br>

            <label for="">LAST NAME</label>
            <input value="{{$user->lname}}" type="text" name="lname">

            <br>

            <label for="">EMAIL</label>
            <input value="{{$user->email}}" type="text" name="email">

            <br>

            <label for="">PASSWORD</label>
            <input value="" type="text" name="password">

            <br>

            <label for="">USER TYPE</label>
            <select name="role_id" value="{{$user->role_id}}">
                @foreach(App\Role::get() as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
            <br><br><br>
            <button type="submit">edit</button>

        </form>
    </div>
@endsection
