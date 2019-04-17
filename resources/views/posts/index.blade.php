@extends('layouts.app')

@section('content')
    {{-- Get all the months in which we have posts --}}
    @php
        $months = [];
        foreach ($posts as $post) {
            $date_obj = new DateTime($post->date);
            if(!in_array($date_obj->format('F Y'), $months)){
                array_push($months, $date_obj->format('F Y'));
            }
        }
    @endphp
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Selectați luna
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach ($months as $month)
                <a href="#" class="dropdown-item">{{$month}}</a>
            @endforeach
        </div>
    </div>
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
                <br>
            @endif
        @endforeach
        {{-- paginate 
        {{$posts->links()}} --}}
    @else
        <p>No posts found</p>
    @endif
@endsection