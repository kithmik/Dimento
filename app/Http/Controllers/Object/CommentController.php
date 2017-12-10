<?php

namespace App\Http\Controllers\Object;

use App\Models\Object\Comment;
use App\Models\Object\Object;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{


    public function setComment(Request $request, $id){

        if (auth()->check()){
            Comment::create([
                'object_id' => $id,
                'user_id' => auth()->user()->id,
                'comment' => $request->input('comment'),
            ]);
            return "Successfully Commented!";
        }

    }

    public function getComments($id){
        $post = Object::findOrFail($id);

//        return view('post.comments', ['post' => $post]);
    }

    public function deleteComment($id){
        if (auth()->check()){
            $comment = Comment::findOrFail($id);
            if (auth()->user()->id == $comment->user_id || auth()->user()->id == $comment->post->user_id){
                $comment->forceDelete();

            }
            return redirect('/object/'.$comment->post->id);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
    }
}
