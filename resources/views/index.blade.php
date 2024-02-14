@extends('layouts.app')

@section('title', 'Main page')

@section('content')
@if (count($bbs) > 0)
<table class="table table-stripped table borderless">
    <thead>
        <th>Name</th>
        <th>Price</th>
        <th>Author</th>
        <th>Content</th>
        <th>Details</th>
    </thead>
    <tbody>
        @foreach ($bbs as $bb)
        <tr>
            <td>{{ $bb->title }}</td>
            <td>{{ $bb->price }}</td>
            <td>{{ $bb->user->name }}</td>
            <td>{{ $bb->content }}</td>
            <td><a href="{{ route('detail', ['bb' => $bb->id]) }}">Details</a>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection('content')
