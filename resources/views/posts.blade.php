@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="card">
                <div class="card-body">
                    @if ($post -> image)
                        <img src="{{ $post -> get_imagen }}" alt="" class="card-img-top">
                    @elseif($post -> iframe)
                         <div class="embed-responsive embed-responsive-16by9">
                         {!! $post -> iframe !!}
                        </div>
                    @endif
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post-> excerpt }}
                        <a href=" {{ route('post', $post) }} "> Leer mas</a>
                    </p>
                    <p>
                        <em>
                            &ndash; {{ $post -> user -> name }}
                        </em>
                        {{ $post -> created_at -> format('d M y') }}
                    </p>
                </div>
            </div>
            @endforeach

            {{ $posts -> Links("pagination::bootstrap-4") }}
        </div>
    </div>
</div>
@endsection
