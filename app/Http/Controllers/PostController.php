<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $post = new Post();

        $post->title = $request->input('name');
        $post->description = $request->input('description');
        $is_featured = $request->input('checkbox');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('posts', $filename);
            $post->image = $filename;
        }
//        $post->cat_id = $request->input('cat_id');
        $checked = $request->input('checkbox');
        $post->author_id = Auth::id();
        if ($checked){
            $post->is_featured = 1;
        }else {
            $post->is_featured = 0;
        }

        $tags = $request->input('tags');
        $post->tags = $tags;
        $post->save();
        return redirect()->back()->with('message', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::where('id', $id)->first();
        return  view('admin.posts.edit', compact('post'));
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
        $post = Post::find($id);
        $post->title = $request->input('name');
        $post->description = $request->input('description');
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('posts', $filename);
            $post->image = $filename;
        }
//        $post->cat_id = $request->input('cat_id');
        $checked = $request->input('checkbox');
        $post->author_id = Auth::id();
        if ($checked){
            $post->is_featured = 1;
        }else {
            $post->is_featured = 0;
        }

        $tags = $request->input('tags');
        $post->tags = $tags;
        $post->save();
        return redirect()->back()->with('message', 'Post Updated successfully');


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
        $post = Post::where('id', $id)->first();
        $delete = $post->delete();
        if($delete)
        {
            return redirect()->back()->with('message', "Post Deleted Successfully");
        }
    }

    public function postDetails($id){
        $post = Post::find($id);
        $cartProducts = 0;
        if (Auth::check())
        {
            $user = Auth::user();
            $cartProducts = Cart::where('user_id', $user->id)->count();
        }

        $posts = Post::orderBy('created_at', 'desc')->get();

        $relatedPosts = Post::whereNotIn('id', [$id])->take(3)->get();
        $recentPosts = Post::whereNotIn('id', [$id])->take(3)->orderBy('created_at', 'desc')->get();


        $postComments = $post->comments()->get();
        $commentCount = $post->comments()->count();


        return view('pages.post-details', compact('post', 'cartProducts', 'relatedPosts', 'recentPosts', 'commentCount', 'postComments'));
    }

    public function comment(Request $request){

        $comment = new Comment();
        $post_id = $request->input('post_id');
        $content = $request->input('content');
        if (! Auth::check()){
            $name = $request->input('name');
            $email = $request->input('email');

            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('password'),
            ]);

            $comment->content = $content;
            $comment->user_id = $user->id;
            $comment->post_id = $post_id;
        }else {
            $comment->content = $content;
            $comment->user_id = Auth::id();
            $comment->post_id = $post_id;
        }

        $comment->save();

        return redirect()->route('post.details', $post_id);


    }
}
