<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmRegistration;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MobileAPIController extends Controller
{
    public function getCSRF(){
        return csrf_token();
    }

    public function register(Request $request){
        $confirmation_code = str_random(20);

        $data = $request->all();

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
//            'profile_pic' => $data['profile_pic'],
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'type' => $data['type'],
            'confirmation_code' => $confirmation_code,
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Mail::to($data['email'])->send(new ConfirmRegistration($confirmation_code));

        /*if ($request->hasFile('profile_pic')){
            $file_name = $user->id.".".$request->file('profile_pic')->getClientOriginalExtension();
            $file = $request->file('profile_pic')->storeAs(storage_path('app/public/images/profile_pics/'), $file_name);
            User::where('id', $user->id)
                ->update(['profile_pic' => storage_path('app/public/images/profile_pics/').$file_name]);
        }*/

        return $user;
    }


}
