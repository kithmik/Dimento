<?php

namespace App\Http\Controllers;

use App\Models\Advertisement\Advertisement;
use App\Models\Forum\Post;
use App\Models\Object\Object;
use App\Models\Task\Task;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function find($keyword){
        $objects = Object::where('title', 'LIKE', '%'.$keyword.'%')->orderBy('updated_at', 'title')->paginate(10);
        $posts = Post::where('title', 'LIKE', '%'.$keyword.'%')->orderBy('updated_at', 'title')->paginate(10);
        $ads = Advertisement::where('title', 'LIKE', '%'.$keyword.'%')->orderBy('updated_at', 'title')->paginate(10);
        $tasks = Task::where('title', 'LIKE', '%'.$keyword.'%')->orderBy('updated_at', 'title')->paginate(10);

        return view('search_results',['objects' => $objects, 'posts' => $posts, 'advertisements' => $ads, 'tasks' => $tasks]);
    }

    public function objCategories($category){

        $category = urldecode($category);
        $objects = Object::where('category', $category)->get();

        return view('objects.index',['objects' => $objects]);
    }
}
