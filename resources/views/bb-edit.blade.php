@extends('layouts.app')

@section('title', 'Edit bill :: My bills')

@section('content')
<form action="{{ route('bb.update', ['bb' => $bb->id]) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="txtTitle" class="form-label">Goods</label>
        <input name="title" id="txtTitle" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $bb->title) }}">
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="txtContent" class="form-label">Content</label>
        <textarea name="content" id="txtContent" class="form-control @error('content') is-invalid @enderror"
         row="3">{{ old('content', $bb->content) }}</textarea>
        @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="txtPrice" class="form-label">Price</label>
        <input name="price" id="txtPrice" value="{{ old('price', $bb->price) }}" class="form-control @error('price') is-invalid @enderror">
        @error('price')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <input type="submit" class="btn btn-primary" value="Update">
</form>
@endsection
