@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{action('PostsController@update', ['id' => $post->id])}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control">
                <option value="Income">Income</option>
                <option value="Expenses">Expenses</option>
            </select>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control">
                <option value="Salary">Salary</option>
                <option value="Separator">----</option>
                <option value="Food">Food</option>
                <option value="Bills">Bills</option>
                <option value="Home">Home</option>
                <option value="Entertainment">Entertainment</option>
                <option value="Health">Health</option>
            </select>
        </div>
        <div class="form-group">
            <label for="memo">Memo</label>
            <input type="text" name="memo" class="form-control" value="{{$post->memo}}">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control" value="{{$post->amount}}">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control" value="{{$post->date}}">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
@endsection