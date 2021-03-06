@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Inapoi</a>
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">{{$post->type}}</h3>
        </div>
        <div class="card-body">            
            <p>Category: {{$post->category}}</p>
            <p>Amount: {{$post->amount}}</p>
            <p>Date: {{$post->date}}</p>
            <p>Memo: {{$post->memo}}</p> 
            <small>de {{$post->user->name}}</small>
        </div>              
    </div>
    @if(Auth::user()->id == $post->user_id)
        <a href="/posts/{{$post->id}}/edit" class="btn btn-primary mt-3">Edit</a>
        <form action="{{action('PostsController@destroy', ['id' => $post->id])}}" method="post" class="float-right mt-3">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete" class="btn btn-danger">
        </form>
    @endif
@endsection