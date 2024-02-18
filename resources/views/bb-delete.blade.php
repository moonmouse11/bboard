@extends('layouts.app')

@section('title', 'Delete bill :: My bills')

@section('content')
<p>Author: {{ $bb->user->name }}</p>
<form action="{{ route('bb.destroy', ['bb' => $bb->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" class="btn btn-danger" value="Delete">
</form>
@endsection
