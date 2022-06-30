@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar Articulo
                    <a href="" class="btn btn-sm btn-primary">Guardar</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="" method="POST">
                        <div>
                            <label for="" class="form-label">Titulo: </label>
                            <input name="title" value="{{ $post -> title }}" class="form-control">
                        </div>
                        <div>
                            <label for="" class="form-label">Cuerpo: </label>
                            <textarea name="body" class="form-control" style="height: 200px"> {{ $post -> body }} </textarea>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
