@extends('layouts.app')

@section('content')
    @if(count($days) > 0)
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
        @foreach($days as $day => $posts)
            <div class="card mt-3">
                <div class="card-header">
                    <span>{{$day}}</span>
                    <span class="float-right">
                        @if(array_key_exists($day, $incomes) && array_key_exists($day, $expenses))
                            Incomes: {{$incomes[$day]}} | Expenses: {{$expenses[$day]}}
                        @elseif(array_key_exists($day, $incomes))
                            Incomes: {{$incomes[$day]}}
                        @elseif(array_key_exists($day, $expenses))
                            Expenses: {{$expenses[$day]}}
                        @endif
                    </span>
                </div>
                @foreach ($posts as $post)
                    <div class="card-body">
                        <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->category}}</a></h3>
                        <p>{{$post->memo}}, {{$post->amount}}</p> 
                        <small>de {{$post->user->name}}</small>              
                    </div>
                    @if(!$loop->last)
                        <hr>
                    @endif                   
                @endforeach
            </div>
            <br>
        @endforeach
        {{-- paginate 
        {{$posts->links()}} --}}
    @else
        <p>No posts found</p>
    @endif
@endsection