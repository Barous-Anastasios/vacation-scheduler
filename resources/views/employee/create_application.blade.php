@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col md12">
                <h4>CREATE APPLICATION</h4>
                <hr><br><br>

                <form action="/application/submit" method="post">
                    {{ csrf_field() }}
                    <label for="">FROM</label>
                    <input name="start" type='text' class="datepicker-here" data-date-format="dd/mm/yyyy" data-language='en'/>

                    <label for="">TO</label>
                    <input name="end" type='text' class="datepicker-here" data-date-format="dd/mm/yyyy" data-language='en'/>

                    <br><br>

                    <label for="">REASON</label>
                    <textarea rows="20" style="height: 150px" cols="20" name="reason" >{{old('reason')}}</textarea>

                    <br><br>

                    <button class="btn" type="submit">submit</button>
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
