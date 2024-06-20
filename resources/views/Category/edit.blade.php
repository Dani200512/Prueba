@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Category</h1>
    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
        </div>
        
        <div class="form-group">
            <label for="color">Color</label>
            <input type="number" class="form-control" id="color" name="color" value="{{ $category->color }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection