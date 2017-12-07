<?php

namespace App\Http\Controllers;

use App\Forum\Post;
use App\Forum\Reply;
use App\Mail\ConfirmRegistration;
use App\Models\Object\Object;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MobileAPIController extends Controller
{
    
    public function getCSRF(){
        return response(json_encode(csrf_token()), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
    }

    public function register(Request $request){


        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'string|max:15',
            'dob' => 'date|before: 13 years ago',
            'type' => 'required|in: 1,2,3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response(json_encode(['status' => 0, 'data'=>"Error While Signing up."/*, 'errors'=>$validator->errors()*/]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
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
        
        $email = $request->email;
        $password = bcrypt($request->password);
        
        $user = User::where('email', $email)
            ->where('password', $password)
            ->get();
        
        if (count($user) == 1){
            auth()->login($user, true);

            return response(json_encode(['status'=>1, 'data'=>['user'=>$user]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
        
        else{
            return response(json_encode(['status' => 0, 'data'=>"Error! These credentials do not match our records."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
        
    }
    
    public function getObjects(){
        if (auth()->check()){
            $objects = Object::all();
            
            return response(json_encode(['status'=>1, 'data'=>['objects'=>$objects]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
        else{
            return response(json_encode(['status'=>0, 'data'=>"Error! You haven't logged in."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
    }
    
    public function getForumPosts(){
        if (auth()->check()){
            $posts = Post::all();

            return response(json_encode(['status'=>1, 'data'=>['posts'=>$posts]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
        else{
            return response(json_encode(['status'=>0, 'data'=>"Error! You haven't logged in."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
    }
    
    public function showForumPost($id){
        if (auth()->check()){
            $post = Post::findOrFail($id);
            $replies = Reply::where('post_id', $id)->get();
            return response(json_encode(['status'=>1, 'data'=>['post'=>$post, 'replies'=>$replies]]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
        else{
            return response(json_encode(['status'=>0, 'data'=>"Error! You haven't logged in."]), 200, array('Content-Type' => 'application/json', 'Access-Control-Allow-Origin'=>'*'));
        }
    }
    


}
