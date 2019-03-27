@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h4>My applications</h4>

            <hr>

            <br><br>

            <a class="btn" href="/application/create">submit request</a>

            <br><br>

            <table class="table">
                <thead>
                <tr>
                    <th>DATE SUBMITTED</th>
                    <th>DATES REQUESTED</th>
                    <th>STATUS</th>
                </tr>
                </thead>
                <tbody>
                @foreach($applications as $application)
                    <tr>
                        <td>{{$application->created_at->format('d/m/Y')}}</td>
                        <td>{{$application->start->format('d/m/Y')}} - {{$application->end->format('d/m/Y')}}</td>
                        <td>{{$application->status->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{$applications->links()}}
        </div>
    </div>
@endsection
