<?php

namespace App\Http\Controllers\Object;

use App\Models\Advertisement\Advertisement;
use App\Models\Object\Object;
use App\Models\Object\ObjectView;
use App\Models\Report;
use App\Models\User\Follow;
use App\Models\User\Notification;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ObjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function report(Request $request){
        if (auth()->check()){
            $report = new Report;
            $report->object_id = $request->input('reporting_post_id');
            $report->user_id = auth()->user()->id;
            $report->category = $request->input('report_category');
            $report->title = $request->input('report_reason');
            $report->description = $request->input('report_description');
            $report->type = 1;
            $report->save();

            return ['msg' => "Report was submitted successfully", 'status' => 1];
        }
        else{
            return ['msg' => "You must login in order to submit this report", 'status' => 0];
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = Object::all();


       // $objects->incrementObjectViews(1);
        return view('objects.index',['objects' => $objects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('objects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        $privacy =

        $object = new Object;
        $object->title = $request->input('title');
        $object->description = $request->input('description');
        $object->category = $request->input('category');
        $object->user_id = auth()->user()->id;
        $object->privacy = !empty($request->input('privacy'))?$request->input('privacy'):1;
        $object->save();

        $msg = '';

        if ($request->hasFile('object')){

            $path = "/public/models/main/$object->id";

            Storage::makeDirectory($path);

            $object_file = $request->file('object');
            $object_file_name = strtoupper($object_file->getClientOriginalName());

            Storage::makeDirectory($path."/objects");
            $object_file->storeAs("/models/main/$object->id/objects/", $object_file_name,'public');

            Object::where('id', $object->id)
                ->update([
                    'object_location' => "/storage/models/main/$object->id/objects/".$object_file_name,
                    //'texture_location' => "/storage/models/main/$object->id/textures/".$texture_file_name,
                ]);

            $texture_file_name = null;
            if ($request->hasFile('texture')){


//                $texture_files = $request->textures;

                $count = count($request->file('texture'));

                Storage::makeDirectory($path."/textures");

                /*for ($i = 0; $i < $count; $i++){
                    $texture_file = $request->file('texture');
                }*/

                foreach ($request->file('texture') as $texture_file){

                    $texture_file_name = strtoupper($texture_file->getClientOriginalName());

                    $texture_file->storeAs("/models/main/$object->id/textures/", $texture_file_name, 'public');

                    Object::where('id', $object->id)
                        ->update([
                           // 'object_location' => "/storage/models/main/$object->id/objects/".$object_file_name,
                            'texture_location' => "/storage/models/main/$object->id/textures/".$texture_file_name,
                        ]);

                }



                $msg .= "Object and textures were saved successfully";

            }

            Object::where('id', $object->id)
                ->update([
                    'object_location' => "/storage/models/main/$object->id/objects/".$object_file_name,
                    'texture_location' => "/storage/models/main/$object->id/textures/".$texture_file_name,
                ]);

            $notification = new Notification();
            $notification->notification = auth()->user()->first_name." ".auth()->user()->last_name." Uploaded a new 3D model Object.";
            $notification->link = '/object/'.$object->id;
            $notification->save();
            $followed_bys = Follow::where('following_id', $object->user_id)->get();
            foreach ($followed_bys as $followed_by){
                $following_user = User::findOrFail($followed_by->follower_id);
                $following_user->notifications()->attach($notification->id);
        }

            return redirect()->to('/object/'.$object->id);

        }

        else{
            $object->forceDelete();
        }

//        return response($msg, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ads = Advertisement::orderby('updated_at', 'desc')->paginate(3);

        $object = Object::findOrFail($id);

        $object->incrementObjectViews(1);

        /*if(auth()->check()){
            ObjectView::updateOrCreate(
                ['object_id' => $object->id, 'user_id'=>auth()->user()->id],
                ['opened' => 1]
            );
        }*/

//        $object = Object::where('id', $id)->get();
        return view('objects.view', ['object' => $object , 'ads' => $ads]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('objects.edit');
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

        if (auth()->check()){
            $object = Object::findOrFail($id);
//            $post_id = $comment->object->id;
            if (auth()->user()->id == $object->user_id ||  auth()->user()->type == 4 ){
                $object->forceDelete();

            }
            return redirect('/object/');
        }
    }
}
