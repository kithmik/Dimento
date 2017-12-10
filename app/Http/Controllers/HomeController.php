<?php

namespace App\Http\Controllers;

use App\Models\Advertisement\Advertisement;
use App\Models\Forum\Post;
use App\Models\Task\Task;
use App\Models\User\User;
use App\Models\Object\Object;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = Object::all();
        $posts = Post::all();
        $ads = Advertisement::all();
        $tasks = Task::all();

        return view('home',['objects' => $objects, 'posts' => $posts, 'advertisements' => $ads, 'tasks' => $tasks]);
    }

    public function confirm($code){
        if ($code == auth()->user()->confirmation_code){
            User::where('id', auth()->user()->id)
                ->update(['confirmation_code' => null]);

            return redirect()->to('/home');
        }


    }
}
