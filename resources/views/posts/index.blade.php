@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Articulo
                    <a href="{{ route('posts.index') }}" class="btn btn-sm btn-primary"> Crear </a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <th> ID </th>
                            <th>Titulo</th>
                            <th> </th>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        {{ $post -> id }}
                                    </td>
                                    <td>
                                        {{ $post -> title }}
                                    </td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-dark" >
                                            Editar
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('posts.destroy', $post)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input 
                                                type="submit" 
                                                value="Eliminar" 
                                                class="btn btn-sm btn-danger"
                                                onclick = "return confirm('¿Desea Eliminar..?')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection