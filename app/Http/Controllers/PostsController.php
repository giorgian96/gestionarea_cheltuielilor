<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DateTime;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('date', 'desc')->get();

        // Obtine lunile in care avem postari
        $months = [];
        foreach ($posts as $post) {
            $date_obj = new DateTime($post->date);
            if(!in_array($date_obj->format('F Y'), $months)){
                array_push($months, $date_obj->format('F Y'));
            }
        }

        // Calculeaza venituri si cheltuieli pentru fiecare zi in parte
        $incomes = [];
        $expenses = [];

        foreach ($posts as $post) {
            if($post->category == 'Income'){
                if(array_key_exists($post->date, $incomes)){
                    $incomes[$post->date] += $post->amount;
                }else{
                    $incomes[$post->date] = $post->amount;
                }
            }else if($post->category == 'Expenses'){
                if(array_key_exists($post->date, $expenses)){
                    $expenses[$post->date] += $post->amount;
                }else{
                    $expenses[$post->date] = $post->amount;
                }
            }
        }

        // Grupeaza posturile in functie de zi
        $days = [];
        foreach ($posts as $post) {
            if(array_key_exists($post->date, $days)){
                array_push($days[$post->date], $post);
            }else{
                $days[$post->date] = [];
                array_push($days[$post->date], $post);
            }
        }

        return view('posts.index')->with([
            'days' => $days,
            'months' => $months,
            'incomes' => $incomes,
            'expenses' => $expenses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'category' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);

        // Create post
        $post = new Post;
        $post->date = $request->input('date');
        $post->type = $request->input('type');
        $post->category = $request->input('category');
        $post->memo = $request->input('memo');
        $post->amount = $request->input('amount');  
        $post->user_id = auth()->user()->id;      
        $post->save();

        return redirect('/posts')->with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required',
            'category' => 'required',
            'amount' => 'required',
            'date' => 'required'
        ]);

        // Update post
        $post = Post::find($id);
        $post->date = $request->input('date');
        $post->type = $request->input('type');
        $post->category = $request->input('category');
        $post->memo = $request->input('memo');
        $post->amount = $request->input('amount');        
        $post->save();

        return redirect('/posts')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check for correct user
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error', 'Unauthorized page');
        }
        
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted');
    }
}
