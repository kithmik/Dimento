<?php

namespace App\Http\Controllers\Message;

use App\Models\Message\Message;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function to($id){
        $user = User::findOrFail($id);
        return view('messages.index', ['user' => $user]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 0)
    {
        $messaged_users = Message::select('sender_id', 'recipient_id')
            ->where('sender_id', auth()->user()->id)
            ->orWhere('recipient_id', auth()->user()->id)
            ->groupBy('sender_id', 'recipient_id')
            ->distinct()
            ->get();

        $user_ids = array();
        foreach ($messaged_users as $messaged_user){
            if ($messaged_user->sender_id != auth()->user()->id){
                if (!in_array($messaged_user->sender_id, $user_ids)){
                    array_push($user_ids, $messaged_user->sender_id);
                }
                continue;
            }
            elseif ($messaged_user->recipient_id != auth()->user()->id){
                if (!in_array($messaged_user->recipient_id, $user_ids)){
                    array_push($user_ids, $messaged_user->recipient_id);
                }
                continue;
            }
        }

        if ($id != 0 && !in_array($id, $user_ids)){
            array_push($user_ids, $id);
        }

        $users = User::whereIn('id', $user_ids)->get();

//        dd($users);
        return view('messages.index', ['users'=> $users , 'id' => $id]);
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

        $messages = new Message;
//        $messages->;

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
