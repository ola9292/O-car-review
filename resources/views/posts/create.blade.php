{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="">Title</label>
        <input type="text" name="title"><br />
        <label for="">Description</label>
        <textarea id="" cols="30" rows="10" name="body"></textarea><br />
        <input type="submit">
    </form>
</body>
</html> --}}

@extends('layouts.app')

@section('content')
<div class="w-3/5 border flex justify-center p-4">
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" class="w-2/3">
        @csrf
       <div class="flex flex-col">
            <div class="">
                <label for="title">Title</label>
                <input type="text" name="title" class="border border-gray-600 px-5 w-full" ><br />
            </div>
            
            <label for="">Description</label>
            <textarea id="" cols="30" rows="10" name="body"></textarea><br />
            <input type="file" name="cover_image">
            <input type="submit" class="border mt-4 py-1 text-white rounded-lg bg-gray-400">
       </div>
           
      
        
    </form>
</div>

@endsection