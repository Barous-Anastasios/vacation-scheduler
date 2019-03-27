@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Users</h4>
            <hr>

            <br><br>

            <a class="btn" href="/user/create">create user</a>

            <br><br>

            <table class="responsive-table">
                <thead>
                <tr>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>USER TYPE</th>
                    <th>EDIT</th>
                </tr>
                </thead>

                <tbody>
                @foreach(App\User::get() as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->lname}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>
                            <a href="/user/edit/{{$user->id}}">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
