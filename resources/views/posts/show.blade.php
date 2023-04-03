{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>More about the property...</h2>
 
    <div>
        
        <a href="/posts">Back</a>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <small>{{ $post->created_at }}</small>
   
     
    </div>
        

</body> --}}


@extends('layouts.app')

@section('content')


<div class="p-4 border border-gray-600">
    <h2>More about the property...</h2>
    <a href="/posts">Back</a>
    <h2 class="text-xl font-bold">{{ $post->title }}</h2>
    <img src="/storage/cover_images/{{ $post->cover_image }}" alt="">
    <p class="text-lg">Body: {{ $post->body }}</p>
    <small>Created at: {{ $post->created_at }}</small>

 
</div>
    
@endsection