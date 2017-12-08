<?php

namespace App\Http\Controllers\Object;

use App\Models\Object\Object;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

            $object_file = $request->file('object');
            $object_file_name = $object->id.".".$object_file->getClientOriginalExtension();
            $object_file->storeAs("models/main/objects/", $object_file_name,'public');

            $texture_file_name = null;
            if ($request->hasFile('object')){
                $texture_file = $request->file('texture');
                $texture_file_name = $object->id.".".$texture_file->getClientOriginalExtension();
                $texture_file->storeAs("models/main/textures/", $texture_file_name, 'public');

                $msg .= "Object and textures were saved successfully";

            }

            Object::where('id', $object->id)
                ->update([
                    'object_location' => "/models/main/objects/".$object_file_name,
                    'texture_location' => "models/main/textures/".$texture_file_name,
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
//        $object = Object::findOrFail($id);
        $object = Object::where('id', $id)->get();
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
