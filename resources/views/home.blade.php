@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{session()->get('message')}}
                    </div>
                @endif
                @include(auth()->user()->role->name . '.index')
            </div>
        </div>
    </div>
@endsection
