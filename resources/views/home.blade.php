@extends('layouts.app')

@section('title', 'My Bills')

@section('content')
<h2>Hi {{ Auth::user()->name }}</h2>
<p class="text-end"><a href="{{ route('bb.create') }}">Add bill</a></p>
@if (count($bbs) > 0)
<table class="table table-striped table-borderless">
    <thead>
        <tr>
            <th>Bill</th>
            <th>Price</th>
            <th colspan="2">&nbsp;</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bbs as $bb)
            <tr>
                <td><h3>{{ $bb->title }}</h3></td>
                <td>{{ $bb->price }}</td>
                <td><a href="{{ route('bb.edit', ['bb' => $bb->id]) }}">Update</a></td>
                <td><a href="{{ route('bb.delete', ['bb' => $bb->id]) }}">Delete</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
