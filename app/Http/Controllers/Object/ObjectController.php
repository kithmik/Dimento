<?php

namespace App\Http\Controllers\Object;

use App\Models\Object\Object;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ObjectController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('objects.index');
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

        $privacy =

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

        }

        return response($msg, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = Object::findOrFail($id);
//        $object = Object::where('id', $id)->get();
        return view('objects.view', ['object' => $object]);
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
    }
}
