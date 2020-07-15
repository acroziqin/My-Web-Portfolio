@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    Welcome
    <div class="container">
        <h3>My name is {{ $name }}</h3>
    </div>
@endsection