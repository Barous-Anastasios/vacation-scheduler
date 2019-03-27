@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col m6 offset-m2">
                <h4>EDIT USER</h4>
                <form action="/user/edit/{{$user->id}}" method="post">
                    {{csrf_field()}}
                    <label for="">FIRST NAME</label>
                    <input value="{{old('first_name') ?? $user->first_name}}" type="text" name="first_name">

                    <br>

                    <label for="">LAST NAME</label>
                    <input value="{{old('last_name') ?? $user->last_name}}" type="text" name="last_name">

                    <br>

                    <label for="">EMAIL</label>
                    <input value="{{old('email') ?? $user->email}}" type="text" name="email">

                    <br>

                    <label for="">PASSWORD</label>
                    <input value="" type="password" name="password">

                    <br><br>

                    <label for="">USER TYPE</label>
                    <select name="role_id" value="{{old('role_id') ?? $user->role_id}}">
                        @foreach(App\Role::get() as $role)
                            <option {{ old('role_id') == $role->id ? "selected" : "" }} {{ $user->role->id == $role->id ? "selected" : "" }} value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                    <br>
                    <button class="btn" type="submit">EDIT</button>
                </form>

                <br>

                @if ($errors->any())
                    <div class="alert alert-danger red light-2 white-text" style="padding:20px;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
