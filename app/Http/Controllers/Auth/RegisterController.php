<?php

namespace App\Http\Controllers\Auth;

use App\Mail\ConfirmRegistration;
use App\Models\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

//    protected $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
//            'profile_pic' => 'image',
            'phone' => 'string|max:15',
            'dob' => 'date|before: 13 years ago',
            'type' => 'required|in: 1,2,3',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
//        $request = new  Request;
        $confirmation_code = str_random(20);

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
