@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="card mt-3">
                <div class="card-body">
                    <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->category}}</a></h3>
                    <p>{{$post->memo}}, {{$post->amount}}</p> 
                    <small>by {{$post->user->name}}</small>              
                </div>              
            </div>
        @endforeach
        {{-- paginate --}}
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection