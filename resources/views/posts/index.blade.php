@extends('layouts.app')

@section('content')
    <h1>Cheltuieli</h1>
    @if(count($posts) > 0)
        @php 
            $date = "";
        @endphp
        @foreach($posts as $post)
            @if($post->date != $date) 
                @if(!$loop->first) {{-- daca nu e primul loop inchidem div --}}
                </div>
                @endif
                @php 
                    $date = $post->date;
                @endphp
                <div class="card mt-3">
                    <div class="card-header">
                        <span>{{$post->date}}</span>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->category}}</a></h3>
                        <p>{{$post->memo}}, {{$post->amount}}</p> 
                        <small>de {{$post->user->name}}</small>              
                    </div>
            @else 
                    <hr>
                    <div class="card-body">
                        <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->category}}</a></h3>
                        <p>{{$post->memo}}, {{$post->amount}}</p> 
                        <small>de {{$post->user->name}}</small>              
                    </div>
            @endif
            @if($loop->last) {{-- daca e ultimul loop inchidem div --}}
                </div>
            @endif
        @endforeach
        {{-- paginate 
        {{$posts->links()}} --}}
    @else
        <p>No posts found</p>
    @endif
@endsection