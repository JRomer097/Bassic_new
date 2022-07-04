@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar Articulo
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action=" {{ route('posts.update', $post ) }} " method="POST" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label for="" class="form-label">Titulo: </label>
                            <input name="title" value="{{ old('title', $post -> title) }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Image </label>
                            <input name="file" type="file">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Contenido: </label>
                            <textarea name="body" class="form-control" style="height: 200px" required> {{ old('body', $post -> body) }} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Contenido embedido: </label>
                            <textarea name="iframe" class="form-control" style="height: 200px"> {{ old('iframe', $post -> iframe) }}</textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            @method('PUT')
                            <input type="submit" value="Actualizar" class="btn btn-sm btn-success">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
