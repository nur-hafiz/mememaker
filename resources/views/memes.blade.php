@extends('templates.default')

@section('content')
    <ul>
        @foreach ($memes as $meme)
            <p class="meme-text">{{ $meme->title }}</p>
            <div class="meme" style="background-image: url('{{ $meme->image }}')"></div>
        @endforeach
    </ul>
@endsection