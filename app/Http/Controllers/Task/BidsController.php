<?php

namespace App\Http\Controllers\Task;

use App\Models\Task\Bids;
use App\Models\Task\Task;
use App\Models\User\Follow;
use App\Models\User\Notification;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BidsController extends Controller
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
    public function create($id)
    {
        $task = Task::findOrFail($id);

        if ($task->type == 0){
            $bids = Bids::where('user_id', auth()->user()->id)
                ->where('task_id', $task->id)
                ->get();
            /*if (count($bids)){
                return view('tasks.bid_history', ['bids' => $bids, 'task' => $task]);
            }*/

        }

        return view('tasks.apply', ['task' => $task]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task_id = $request->task_id;
        $task = Task::findOrFail($task_id);

        $bid = new Bids;
        $bid->title = $request->title;
        $bid->description = $request->description;
        $bid->task_id = $task_id;
        $bid->user_id = auth()->user()->id;

        if ($task->type == 0){
           $bid->amount = $request->amount;
        }


        $bid->save();

        if ($task->type == 1){
            if ($request->hasFile('proposal')){
                $file = $request->file('proposal');
                $file_name = $bid->id.".".$file->getClientOriginalExtension();
                $file->storeAs('/bids/proposals', $file_name, 'public');
                Bids::where('id', $bid->id)
                    ->update(['proposal' => '/storage/bids/proposals/'.$file_name]);
            }
        }

        try{
            $notification = new Notification;
            $notification->notification = '<i class="fa fa-credit-card" aria-hidden="true"></i> '.auth()->user()->first_name." ".auth()->user()->last_name." made a new bid.";
            $notification->link = '/task/'.$task->id;
            $notification->save();

            $task_posted_user = User::findOrFail($task->user_id);
            $task_posted_user->notifications()->attach($notification->id);

            $other_bidders = Bids::where('task_id', $task->id)->get();
            foreach ($other_bidders as $other_bidder){
                $other_bidder = User::findOrFail($other_bidder->user_id);
                $other_bidder->notifications()->attach($notification->id);
            }
        }
        catch (\Exception $exception){

        }




        return redirect()->to('/task/'.$task_id);

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
