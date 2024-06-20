@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea Categoria</h1>
        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{old('name')}}">
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Codigo de color</label>
            <input type="text" class="form-control" id="color" name="color" required>
        </div>

        <div class="form-group">
            <label for="user_id"></label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Crear Categoria</button>


    </form>
    </div>
@endsection
