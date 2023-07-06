@extends('theme/base')

@section('content')

    <div class="container py-5 text-center">

        @if (isset($client))
            <h1>Editar cliente</h1>
        @else
            <h1>Crear cliente</h1>
        @endif

        @if (isset($client))
            <form action="{{ route('client.update', $client)}}" method="post">
                @method('PUT')
        @else
            <form action="{{ route('client.store')}}" method="post">
        @endif


            @csrf

            <div class="mb-3">
                <label for="name" class="form">Nombre</label>
                <input type="text" name="name" class="form-control" placeholder="Nombre del Cliente" value="{{old('name') ?? @$client->name}}">
                <p class="form-text">Escribe el nombre del cliente</p>
                @error('name')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="due" class="form">Saldo</label>
                <input type="number" name="due" class="form-control" placeholder="Saldo del Cliente" step="0.01" required value="{{old('due') ?? @$client->due}}>
                <p class="form-text">Escribe el saldo</p>
                @error('due')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="comments" class="form">Comentarios</label>
                <textarea class="form-control" id="" cols="30" rows="4">{{old('comments') ?? @$client->comments}}</textarea>
                <p class="form-text">Escribe un comentario</p>
                @error('comments')
                    <p class="form-text text-danger">{{ $message }}</p>
                @enderror
            </div>

            @if (isset($client))
            <button type="submit" class="btn btn-info">Editar cliente</button>
            @else
                <button type="submit" class="btn btn-info">Guardar cliente</button>
            @endif


        </form>


    </div>
@endsection
