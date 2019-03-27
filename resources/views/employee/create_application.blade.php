@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col m12">
                <h4>CREATE APPLICATION</h4>
                <hr><br><br>

                <form action="/application/submit" method="post">
                    {{ csrf_field() }}
                    <label for="">START</label>
                    <input value="{{old('start')}}" name="start" type='text' class="datepicker" data-date-format="dd/mm/yyyy" data-language='en'/>

                    <br>

                    <label for="">END</label>
                    <input value="{{old('end')}}" name="end" type='text' class="datepicker" data-date-format="dd/mm/yyyy" data-language='en'/>

                    <br><br>

                    <label for="">REASON</label>
                    <textarea rows="20" style="height: 150px;padding:10px;" cols="20" name="reason" >{{old('reason')}}</textarea>

                    <br><br>

                    <button class="btn" type="submit">submit</button>
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
