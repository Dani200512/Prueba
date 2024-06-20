@extends('layouts.app')
<div class="container">
        <h1>{{$category->name}}</h1>
        <p>Color: {{ $category->color }}</p>
    
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
    </div>