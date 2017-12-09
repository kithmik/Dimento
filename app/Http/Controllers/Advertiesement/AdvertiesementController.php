<?php

namespace App\Http\Controllers\Advertiesement;

use App\Models\Advertisement\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AdvertiesementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Advertisement::paginate(6);
//        return view('cardshow');
        return view('advertisements.index', ['ads'=>$ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('advertisements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline'=>'required',
            'time'=>'required'
        ]);
        if ($validator->fails()) {
            return redirect('advertisement/create')
                ->withErrors($validator)
                ->withInput();
        }


        // dd($request->input('time')." ".$request->input('deadline'));

        // date(format)
        $deadline = date("Y-m-d h:i:s", strtotime($request->input('time')." ".$request->input('deadline')));

        // dd($deadline);
        $advertisement = new Advertisement;
         $advertisement->user_id = auth()->user()->id;
        $advertisement->title = $request->input('title');
        $advertisement->description = $request->input('description');
        // $advertisement->image = $request->input('image');
        $advertisement->object = $request->input('object');
        $advertisement->texture = $request->input('texture');
        $advertisement->deadline = $deadline;
        // $advertisement->time = $request->input('time');

        $advertisement->save();

        if ($request->hasFile('image')) {
            # code...
            $file = $request->file('image');

            $file_name = $advertisement->id.".".$file->getClientOriginalExtension();

            $file->storeAs('/images/', $file_name, 'public');

            Advertisement::where('id', $advertisement->id)->update(['image'=>'/storage/images/'.$file_name]);
        }

        return redirect()->to('advertisement/'.$advertisement->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Advertisement::findOrFail($id);

        return view('advertisements.view', ['ad' => $ad]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ad = Advertisement::findOrFail($id);
        return view('advertisements.edit', ['ad' => $ad]);
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
