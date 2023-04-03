{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Welcome to RentOclock</h2>
    @foreach ($posts as $post )
    <div>
        
        <h2><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>  <br />
      
        {{ $post->body }}
        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete">
        </form>
    </div>
        
    @endforeach
</body>
</html> --}}


@extends('layouts.app')
{{-- @vite('resources/css/app.css') --}}
@section('content')
<h2 class="px-6 text-2xl text-center font-bold">Welcome to O-Car Review</h2>
<div class="p-4"><a href="/posts/create">Create New Post</a></div><br />
@foreach ($posts as $post )
    <div class="flex px-6 py-4 gap-4 border mb-2">
      
        
        <div>
            <img src="/storage/cover_images/{{ $post->cover_image }}" style="width:200px">
        </div>
        <div class="">
            <h2 class="font-bold text-lg"><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h2>  <br />
            <small>Written on {{ $post->created_at }} by {{ $post->user->name }}</small>
            @if (!Auth::guest())
                @if(Auth::user()->id == $post->user_id)
                <div><a href="{{ route('posts.edit', $post->id) }}" class="text-green-700">Edit</a></div>
            
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <input type="submit" value="Delete" class="border px-2 py-1 rounded-lg bg-red-300 text-red-800">
            </form>
                @endif
            @endif
        </div>
    </div>

    
@endforeach
@endsection