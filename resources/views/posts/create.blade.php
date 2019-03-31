@extends('layouts.app')

@section('content')
    <h1>Create Post</h1>
    <form action="{{action('PostsController@store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" onclick="showInput(this)">
                <option value="Income">Income</option>
                <option value="Expenses">Expenses</option>
            </select>
        </div>
        {{-- Incomes --}}
        <div id="Income" class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control">
                <option value="Salary">Salary</option>
                <option value="Sale">Sale</option>
                <option value="Rent">Rent</option>
                <option value="Dividend">Dividend</option>
                <option value="Investment">Investment</option>
                <option value="Lottery">Lottery</option>
            </select>
        </div>
        {{-- Expenses --}}
        <div id="Expenses" class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control">
                <option value="Food">Food</option>
                <option value="Bills">Bills</option>
                <option value="Home">Home</option>
                <option value="Entertainment">Entertainment</option>
                <option value="Health">Health</option>
                <option value="Transportation">Transportation</option>
                <option value="Clothing">Clothing</option>
                <option value="Sport">Sport</option>
                <option value="Pet">Pet</option>
                <option value="Beauty">Beauty</option>
                <option value="Electronics">Electronics</option>
                <option value="Gifts">Gifts</option>
                <option value="Travel">Travel</option>
                <option value="Education">Education</option>
                <option value="Books">Books</option>
            </select>
        </div>
        <div class="form-group">
            <label for="memo">Memo</label>
            <input type="text" name="memo" class="form-control">
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" name="amount" class="form-control">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" class="form-control">
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
@endsection