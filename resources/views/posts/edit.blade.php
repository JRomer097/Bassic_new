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

                    <form action=" {{ route('posts.update', $post ) }} " method="POST"> 
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="" class="form-label">Titulo: </label>
                            <input name="title" value="{{ $post -> title }}" class="form-control">
                        </div>
                        <div>
                            <label for="" class="form-label">Cuerpo: </label>
                            <textarea name="body" class="form-control" style="height: 200px"> {{ $post -> body }} </textarea>
                        </div>
                        <div>
                            <input type="submit" value="Guardar" class="btn btn-sm btn-success">
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
