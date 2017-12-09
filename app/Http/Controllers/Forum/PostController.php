<?php

namespace App\Http\Controllers\Forum;

use App\Models\Forum\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{

    public function getCategories(){
        return view('forum.categories');
    }

    public function getPosts($category){
        $posts = post::where('category', $category)->get();
        return view('forum.index', ['posts' => $posts]);
    }    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('forum.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('forum.create');
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
        /*$validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect('foInquiryrum/categories')
                ->withErrors($validator)
                ->withInput();
        }*/

        $post = new Post;
        $post->title = $request->input('name');
        $post->category  = $request->input('category');
        $post->description  = $request->input('description');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect()->to('post/'.$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('forum.view', ['post' => $post]);
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
