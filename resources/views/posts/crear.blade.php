@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Crear Articulo
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action=" {{ route('posts.store') }} " method="POST"  enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="" class="form-label">Titulo* </label>
                            <input name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Imagen </label>
                            <input type= "file" name="file"> </input>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Contenido: </label>
                            <textarea name="body" class="form-control" row="6" value="{{ old('body') }}" required> </textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Contenido embedido </label>
                            <textarea name="iframe" class="form-control"> </textarea>
                        </div>
                        <div class="form-group">
                            @csrf
                            <input type="submit" value="Guardar" class="btn btn-sm btn-secondary">
                        </div>
                    </form>
                </div>

                <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
