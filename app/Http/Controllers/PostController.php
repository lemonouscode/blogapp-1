<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->body = substr($post->body, 0, 100) . '...';
        }


        return view('posts', compact('posts'));
    }

    public function dashboard(){
        $posts = Post::all();

        return view('postdashboard', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::check()){
            return response('Not Allowed', '401');
        }

        $request->validate([
            'title' => 'required|min:2|max:100|string',
            'body' => 'required|min:10|max:2000|string'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
    
        $post->user()->associate(Auth::user()->id)->save();


        return redirect('createpost')->with('status', 'Post successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('comments')->find($id);
        
        // $post = User::with('comments')->find($id);

        $comments = $post->comments()->with('user')->get();


        // Getting the author of the post
        $posts = Post::with('user')->first();
        $user = $post->user->name;
        $author = $user;


        return view('post', compact('post','comments','author'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        if(!Auth::user()->isAdmin){
            return response('Not Allowed', '401');
        }

        $post = Post::find($id);

        $post->delete();

        return redirect('postdashboard')->with('status', 'Post successfully deleted');
    }
}
