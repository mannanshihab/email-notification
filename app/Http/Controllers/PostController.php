<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Notifications\PostCreated;
use App\Notifications\PostDeleted;
use Flasher\Prime\FlasherInterface;
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
       
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, FlasherInterface $flasher) 
    {
        $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $user = Auth::user();
        $user->notify(new PostCreated($post));
 
        $flasher->addSuccess('Data has been saved successfully!');

        return redirect()->route('admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id , FlasherInterface $flasher)
    {
        //
        $post = Post::find($id);

        if(empty($post)){
            $flasher()->addError('Post Not Found');
            return redirect()->route('admin');
        }
        return view('edit', [
            'post'=>$post
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update($id , Request $request, FlasherInterface $flasher)
    {
        //
        $post = Post::findOrFail($id); 

        $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);
       
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        $flasher->addSuccess('Data has been update successfully!');

        return redirect()->route('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, FlasherInterface $flasher)
    {
        //
        $post = Post::findOrFail($id); 
        $post->delete();
        $user = Auth::user();
        $user->notify(new PostDeleted($post));
        $flasher->addSuccess('Delete Successfully!');

        return redirect()->route('admin');
    }
}
