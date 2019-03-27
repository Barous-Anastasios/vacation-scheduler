<p>
    “​Dear supervisor, employee {{auth()->user()->name}} requested for some time off, starting on
    {{$data['start']}} and ending on {{$data['end']}}, stating the reason:
    {{$data['reason']}}
</p>

<p>
    Click on one of the below links to approve or reject the application:
    <br>
    <a href="{{url('/')}}/application/approve/{{$data['application_id']}}">Approve</a>
    <a href="{{url('/')}}/application/reject/{{$data['application_id']}}">Reject</a>
</p>

