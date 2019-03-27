@extends('layouts.app')

@section('content')
    <div class="container">


        <h2>Users</h2>
        <a class="btn" href="/user/create">create user</a>

        <table class="table">
            <thead>
            <tr>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>EMAIL</th>
                <th>USER TYPE</th>
            </tr>
            </thead>

            <tbody>
            @foreach(App\User::get() as $user)
                <tr>
                    <td>
                        <a href="/user/edit/{{$user->id}}">
                            {{$user->name}}
                        </a>
                    </td>
                    <td>{{$user->lname}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
