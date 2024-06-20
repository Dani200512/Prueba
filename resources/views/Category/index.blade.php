@extends('layouts.app')
@section('content')
<div class="container">
        <h1>Categoria</h1>
        
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Color</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->Color }}</td>
                        
                        <td>
                            <a href="{{ route('categories.show', $category) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
