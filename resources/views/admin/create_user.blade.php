@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>CREATE USER</h4>
        <form action="/user/create" method="post">
            {{csrf_field()}}
            <label for="">FIRST NAME</label>
            <input value="{{old('name')}}" type="text" name="name">

            <br>

            <label for="">LAST NAME</label>
            <input value="{{old('lname')}}" type="text" name="lname">

            <br>

            <label for="">EMAIL</label>
            <input value="{{old('email')}}" type="text" name="email">

            <br>

            <label for="">PASSWORD</label>
            <input value="{{old('password')}}" type="text" name="password">

            <br>

            <label for="">USER TYPE</label>
            <select name="role_id" value="{{old('role_id')}}">
                @foreach(App\Role::get() as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
            <br><br><br>
            <button type="submit">create</button>

        </form>
    </div>

@endsection
