


@extends('layouts.app')

@section('content')
<div class="w-3/5 border flex justify-center p-4">
    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" class="w-2/3">
        @csrf
        @method('PATCH')
        <div  class="flex flex-col">
            <label for="">Title</label>
            <input type="text" name="title" value="{{ $post->title }}" class="border border-gray-600 px-5 w-full"><br />
            <label for="">Description</label>
            <textarea id="" cols="30" rows="10" name="body">{{ $post->body }}</textarea><br />
            <input type="file" name="cover_image">
            <input type="submit" class="border mt-4 py-1 text-white rounded-lg bg-gray-400">
        </div>
       
    </form>
</div>

{{-- <div class="w-3/5 border flex justify-center p-4">
    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" class="w-2/3">
        @csrf
        @method('PATCH')
       <div class="flex flex-col">
            <div class="">
                <label for="title">Title</label>
                <input type="text" name="title" class="border border-gray-600 px-5 w-full"  value="{{ $post->title }}" ><br />
            </div>
            
            <label for="">Description</label>
            <textarea id="" cols="30" rows="10" name="body">{{ $post->body }}</textarea><br />
            <input type="file" name="cover_image">
            <input type="submit" class="border mt-4 py-1 text-white rounded-lg bg-gray-400" {{ route('posts.update',$post->id) }}>
       </div>
           
      
        
    </form>
</div> --}}
@endsection