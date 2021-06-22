@extends('templates.default')

@section('content')
    <main class="home">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
            <input id="meme-text" type="text" placeholder="enter meme text">
        </div>
        
        <div class="container">
            <canvas id="canvas" width="400" height="400"></canvas>
        </div>

        <div class="container">
            <button id="save">Save</button>
        </div>
        
        <div class="meme-imgs">
            <img src="images/mememaker1.jpg" class="meme-img">
            <img src="images/mememaker2.jpg" class="meme-img">
            <img src="images/mememaker3.jpg" class="meme-img">
        </div>
    </main>
@endsection

@section('scripts')
    <script src="canvas.js"></script>
@endsection