<?php

namespace App\Http\Controllers\Message;

use App\Models\Message\Message;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

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

    public function getUpdates($id){
        $user = User::findOrFail($id);

//        \Illuminate\Support\Facades\DB::enableQueryLog();

        $messages =  Message::where(function($query) use ($id)
        {
            $query->where("sender_id",$id)
                ->where("recipient_id", auth()->user()->id)
            ->where('read', 0);
        })
            ->orWhere(function($query) use ($id) /*use ($sender, $receiver)*/
            {
                $query->Where("sender_id", auth()->user()->id)
                    ->Where("recipient_id", $id)
                ->where('read', 0);
            })
            ->orderBy('created_at')
            ->get();

//        dd( \Illuminate\Support\Facades\DB::getQueryLog());

        Message::where(function($query) use ($id)
        {
            $query->where("sender_id",$id)
                ->where("recipient_id", auth()->user()->id);
        })
            ->orWhere(function($query) use ($id) /*use ($sender, $receiver)*/
            {
                $query->Where("sender_id", auth()->user()->id)
                    ->Where("recipient_id", $id);
            })
            ->update(['read' => 1]);
/*
//        dd($messages->last()->created_at);
        if (count($messages)){
            session(['chat_last_loaded' => [ $user->id => $messages->last()->created_at]]);
        }*/

//            return $messages;

        if (count($messages)){
            return view('messages.latest_chat', ['messages' => $messages, 'user' => $user, 'id' => $id]);
        }

    }

    public function getMessages($id){

        $user = User::findOrFail($id);

        $messages =  Message::where(function($query) use ($id)
            {
                $query->where("sender_id",$id)
                    ->where("recipient_id", auth()->user()->id);
            })
            ->orWhere(function($query) use ($id) /*use ($sender, $receiver)*/
            {
                $query->Where("sender_id", auth()->user()->id)
                    ->Where("recipient_id", $id);
            })
            ->orderBy('created_at')
            ->get();

        Message::where(function($query) use ($id)
        {
            $query->where("sender_id",$id)
                ->where("recipient_id", auth()->user()->id);
        })
            ->orWhere(function($query) use ($id) /*use ($sender, $receiver)*/
            {
                $query->Where("sender_id", auth()->user()->id)
                    ->Where("recipient_id", $id);
            })
            ->update(['read' => 1]);

/*//        dd($messages->last()->created_at);
        if (count($messages)){
            session(['chat_last_loaded' => [ $user->id => $messages->last()->created_at]]);
        }*/


        return view('messages.chat', ['messages' => $messages, 'user' => $user, 'id' => $id]);
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
        // return $request->all();


        $user = User::findOrFail($request->user_id);

        $id = $user->id;
        /*$last_loaded = session('chat_last_loaded')[$user->id];
        return $last_loaded;*/

        $message = new Message;
        $message->sender_id = auth()->user()->id;
        $message->recipient_id = $user->id;
        $message->message = empty($request->message_text)?'':$request->message_text;

        $message->save();

        if($request->hasFile('attached_file')){
            $file = $request->file('attached_file');
            $file_name = $message->id.".".$file->getClientOriginalExtension();

            $file->storeAs('/messages/images/', $file_name, 'public');
            Message::where('id', $message->id)
                ->update([
                   'image' =>  '/storage/messages/images/'.$file_name,
                ]);
        }

        if($request->has('sketch_img') && $request->sketch_img != null || $request->sketch_img != ''){

            $file_name = $message->id.".png";

            $image = Image::make($request->sketch_img)
                ->save(storage_path('app/public/messages/images/sketches/').$file_name);

            /*$file = $request->file('sketch_img');


            $file->storeAs('/messages/images/sketches/', $file_name, 'public');*/
            Message::where('id', $message->id)
                ->update([
                    'image' =>  '/storage/messages/images/sketches/'.$file_name,
                ]);
        }


        /*if (empty(session('chat_last_loaded'))){
            $last_loaded = Carbon::create($message->created_at)->subSecond();
        }
        else{
            $last_loaded = session('chat_last_loaded')[$user->id];
        }*/

        $messages = Message::where(function($query) use ($id)
        {
            $query->where("sender_id",$id)
                ->where("recipient_id", auth()->user()->id);
        })
            ->orWhere(function($query) use ($id) /*use ($sender, $receiver)*/
            {
                $query->Where("sender_id", auth()->user()->id)
                    ->Where("recipient_id", $id);
            })
//            ->where('created_at', '>' , $last_loaded)
            ->orderBy('created_at')
            ->get();

        /*if (count($messages)){
            session('chat_last_loaded', [ $user->id => $messages->last()->created_at]);
        }*/



        return view('messages.latest_chat', ['messages' => $messages, 'user' => $user, 'id' => $user->id]);
//        return $message;


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
