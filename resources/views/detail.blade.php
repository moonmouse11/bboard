@extends('layouts.app')

@section('title', $bb->title)

@section('content')
    <h2>{{ $bb->title }}</h2>
    <hr class="fucking-line">
    <b>{{ $bb->price }}</b>
    <div>{{ $bb->content }}</div>
    <br>
    <p>Автор: {{ $bb->user->name }}</p>
    <br>
    <a href="{{ route('index') }}">Return to main page</a>
@endsection
