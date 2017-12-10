<?php

namespace App\Http\Controllers\Object;

use App\Models\Object\Rating;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RatingController extends Controller
{

    public function like($id, $state = null){
        if (auth()->check()){
            $likes = Rating::where(['object_id'=>$id, 'user_id'=>auth()->user()->id])->first();
            if (count($likes) == 0){
                Rating::updateOrCreate(
                    ['object_id'=>$id, 'user_id'=>auth()->user()->id],
                    ['status'=>$state]
                );
            }
            else{
                if($state === '1'){
                    Rating::where(['object_id'=>$id, 'user_id'=>auth()->user()->id])
                        ->update(['status'=>1]);
                }
                elseif ($state === '0'){
                    Rating::where(['object_id'=>$id, 'user_id'=>auth()->user()->id])
                        ->update(['status'=>0]);
                }
                else{
                    Rating::where(['object_id'=>$id, 'user_id'=>auth()->user()->id])
                        ->update(['status'=>null]);
                }
            }
            $like_count = Rating::where(['object_id'=>$id, 'status' => 1 ])->count();
            $dislike_count = Rating::where(['object_id'=>$id, 'status' => 0 ])->count();
            $msg = $state === '1'?"You like this post!":($state === '0'?"You Dislike this post!":"Done!");
            return ['message' =>$msg, 'like_count'=>$like_count, 'dislike_count'=>$dislike_count];
        }
    }

    public function rate($id, $rating = null ){

        if (auth()->check()){
            $rates = Rating::where(['object_id'=>$id, 'user_id'=>auth()->user()->id])->first();
            if (count($rates) == 0){
                Rating::updateOrCreate(
                    ['object_id'=>$id, 'user_id'=>auth()->user()->id],
                    ['rating'=>$rating]
                );
                $msg = "You rated ".$rating." star(s) on this object";
                $status = 0;
            }
            else{
                if($rating == $rates->rating){
                    Rating::where('object_id',$id)
                        ->where('user_id',auth()->user()->id)
                        ->update(['rating'=>null]);
                    $msg = "You rating was removed!";
                    $status = -1;
                }
                else{
                    Rating::where('object_id',$id)
                        ->where('user_id',auth()->user()->id)
                        ->update(['rating'=>$rating]);
                    $msg = "You rated ".$rating." star(s) on this object";
                    $status = 1;
                }
            }

            $avg_ratings = Rating::where('object_id', $id)->avg('rating');

            return ['message'=>$msg, 'avg_rating' => round($avg_ratings, 2), 'status' => $status];
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
