@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}<br />
                    <a href="/posts/create"><button class="btn btn-secondary">Create Post</button></a>
                    <table class="table table table">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>
                       @foreach ($posts as $post)
                           <tr>
                            <td>{{ $post->title }}</td>
                            <td><a href="{{ route('posts.edit', $post->id) }}">Edit</a></td>
                            <td>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                           </tr>
                       @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
