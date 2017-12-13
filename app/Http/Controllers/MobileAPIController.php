<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmRegistration;
use App\Models\Forum\Post;
use App\Models\Forum\Reply;
use App\Models\Object\Object;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MobileAPIController extends Controller
{
    
    public function getCSRF(){
        return response(json_encode(['_token'=>csrf_token()]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
    }

    public function register(Request $request){


        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'string|max:15',
            'dob' => 'date|before: 13 years ago',
            'type' => 'required|in: 1,2,3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response(json_encode(['status' => 0, 'data'=>"Error While Signing up.", 'errors'=>$validator->errors()]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }

        $data = $request->all();

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'type' => $request->type,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        auth()->login($user, true);
        return response(json_encode(['status'=>1, 'data'=>['user'=>$user]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
    }
    
    public function login(Request $request){

//        return json_encode($request->all());

//        dd(bcrypt($request->password));
       /* return response($request->all(), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'))
            ->header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');*/

        $email = $request->email;
        $password = bcrypt($request->password);
        
        $user = User::where('email', $email)
//            ->where('password', $password)
            ->first();
        
        if (count($user) == 1 && Hash::check($request->password, $user->password)){

            try{
                auth()->login($user, true);
            }
            catch (\Exception $exception){
                return json_encode(['status' => 0, 'data'=>"Error! Something went wrong while the authentications."]);
            }



//            return response(json_encode(['status'=>1, 'data'=>['user'=>$user]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));

            return json_encode(['status'=>1, 'data'=>['user'=>$user]]);

        }
        
        else{
            return json_encode(['status' => 0, 'data'=>"Error! These credentials do not match our records."]);
        }
        
    }

    public function getObjects(){

        $objects = Object::all();

        return response(json_encode(['status'=>1, 'data'=>['objects'=>$objects]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));

        /*if (auth()->check()){

        }
        else{
            return response(json_encode(['status'=>0, 'data'=>"Error! You haven't logged in."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }*/
    }
    
    public function getForumPosts(){

        $posts = Post::all();

        return response(json_encode(['status'=>1, 'data'=>['posts'=>$posts]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));

        /*if (auth()->check()){

        }
        else{
            return response(json_encode(['status'=>0, 'data'=>"Error! You haven't logged in."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }*/

        /*if (auth()->check()){
            $objects = Object::all();
            
            return response(json_encode(['status'=>1, 'data'=>['objects'=>$objects]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
        else{
            return response(json_encode(['status'=>0, 'data'=>"Error! You haven't logged in."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }*/
    }
    
/*    public function getForumPosts(){
        if (auth()->check()){
            $posts = Post::all();

            return response(json_encode(['status'=>1, 'data'=>['posts'=>$posts]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
        else{
            return response(json_encode(['status'=>0, 'data'=>"Error! You haven't logged in."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
    }*/

    public function storeForumPost(Request $request){
        $post = new Post;

        $post->title = $request->input('title');
        $post->category  = $request->input('category');
        $post->description  = $request->input('description');
        $post->user_id = auth()->user()->id;
        $post->save();

        return $post;
    }

    public function getPosts($category){
        $category = urldecode($category);
        $posts = Post::where('category', $category)->get();
        return response(json_encode(['status'=>1, 'data'=>['posts'=>$posts]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
    }

    public function showForumPost($id){


        $post = Post::findOrFail($id);
        $replies = Reply::where('post_id', $id)->get();
        return response(json_encode(['status'=>1, 'data'=>['post'=>$post, 'replies'=>$replies]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));

        /*if (auth()->check()){

        }
        else{
            return response(json_encode(['status'=>0, 'data'=>"Error! You haven't logged in."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }*/

        /*if (auth()->check()){
            $post = Post::findOrFail($id);
            $replies = Reply::where('post_id', $id)->get();
            return response(json_encode(['status'=>1, 'data'=>['post'=>$post, 'replies'=>$replies]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
        else{
            return response(json_encode(['status'=>0, 'data'=>"Error! You haven't logged in."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }*/

    }
    


}
