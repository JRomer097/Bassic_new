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

                    <form action=" {{ route('posts.store') }} " method="POST">
                        @csrf
                        <div>
                            <label for="" class="form-label">Titulo: </label>
                            <input name="title" class="form-control" value="{{ old('title') }}">
                        </div>
                        <div>
                            <label for="" class="form-label">Cuerpo: </label>
                            <textarea name="body" class="form-control" style="height: 200px" value="{{ old('body') }}"> </textarea>
                        </div>
                        <div>
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
