@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="/submit_application" method="post">
                    {{ csrf_field() }}
                    <label for="">FROM</label>
                    <input name="start" type='text' class="datepicker-here" data-date-format="dd/mm/yyyy" data-language='en'/>

                    <label for="">TO</label>
                    <input name="end" type='text' class="datepicker-here" data-date-format="dd/mm/yyyy" data-language='en'/>

                    <br><br>

                    <label for="">REASON</label>
                    <textarea name="reason" >{{old('reason')}}</textarea>

                    <button type="submit">submit</button>
                </form>

                <br>

                @if ($errors->any())
                    <div class="alert alert-danger">
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
