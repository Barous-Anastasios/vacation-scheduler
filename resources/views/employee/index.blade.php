<h2>My applications</h2>

<a href="/create_application">submit request</a>

<table class="table">
    <thead>
        <tr>
            <th>DATE SUBMITTED</th>
            <th>DATES REQUESTED</th>
            <th>STATUS</th>
        </tr>
    </thead>
    <tbody>
        @foreach(auth()->user()->applications as $application)
        <tr>
            <td>{{$application->created_at->format('d/m/Y')}}</td>
            <td>{{$application->start->format('d/m/Y')}} - {{$application->end->format('d/m/Y')}}</td>
            <td>{{$application->status->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
