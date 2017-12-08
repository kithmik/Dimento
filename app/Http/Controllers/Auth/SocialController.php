<?php

namespace App\Http\Controllers\Auth;

use App\Models\User\Social;
use App\Models\User\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Input;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function handle( $provider )
    {

        $providerKey = Config::get('services.' . $provider);

        if (empty($providerKey)) {
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Something went wrong. Invalid Social Login Provider.');
        }

        if($provider == 'facebook'){

            return Socialite::driver( $provider )->fields([
                'first_name', 'last_name', 'email', 'gender', 'birthday', 'about', 'location',
            ])->scopes([
                'email', 'user_birthday', 'user_location', 'user_about_me',
            ])->redirect();
        }
        elseif($provider == 'google'){
            return Socialite::driver( $provider )->scopes([
                'profile', 'email', 'openid',
                'https://www.googleapis.com/auth/plus.me',
                'https://www.googleapis.com/auth/plus.login',
                'https://www.googleapis.com/auth/userinfo.email',
                'https://www.googleapis.com/auth/userinfo.profile',
                'https://www.googleapis.com/auth/contacts.readonly',
                'https://www.googleapis.com/auth/user.addresses.read',
                'https://www.googleapis.com/auth/user.birthday.read',

            ])->redirect();
        }
        else{
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Something went wrong. Invalid Social Login Provider.');
        }


    }

    public function callback($provider)
    {

        if (Input::get('denied') != '' || Input::get('error')=='access_denied') {

            return redirect()->to('/login')
                ->with('status', 'danger')
                ->with('message', 'You did not share your profile data with our social app.');

        }

        if($provider == 'facebook'){
            $user = Socialite::driver( $provider )->fields([
                'first_name', 'last_name', 'email', 'gender', 'birthday'
            ])->user();
        }
        else if ($provider == 'google'){
            $user = Socialite::driver( $provider )->user();
        }
        else{
            return redirect()->back()
                ->with('status', 'danger')
                ->with('message', 'Something went wrong. Invalid Social Login Provider.');
        }

        //dd($user);

//        return $user;
        $socialUser = null;
        $special_msg = null;
        $redirect_path = '/home';

        //Check is this email present
        $userCheck = User::where('email', '=', $user->email)->first();

        $email = $user->email;

        if (!$user->email) {
            $email = 'missing' . str_random(10);
        }

        if (!empty($userCheck)) {

            $socialUser = $userCheck;

        }
        else {

            $sameSocialId = Social::where('user_id', '=', $user->id)
                ->where('provider', '=', $provider )
                ->first();

            if (empty($sameSocialId)) {


                if($provider == 'facebook'){
                    //There is no combination of this social id and provider, so create new one
                    $newSocialUser = new User;
                    $newSocialUser->email = $email;
//                    $name = explode(' ', $user->name);

                    $newSocialUser->first_name = $user->user['first_name'];

                    if (count($user->user['last_name']) > 0) {
                        $newSocialUser->last_name = $user->user['last_name'];
                    }
                    else{
                        $newSocialUser->last_name = $user->user['first_name'];
                    }

//                    $newSocialUser->gender = $user->user['gender'] == 'male' ? 1 : 0;

                    if(!empty($user->user['birthday'])){
                        $Bdate=date_create_from_format("d/m/Y",$user->user['birthday']);
                        //dd(date('Y-m-d', $user->user['birthday']));
                        $dob =  date_format($Bdate,"Y-m-d");
                        $newSocialUser->dob = $dob;
                    }


                    /*if(!empty($user->user['address']['country'])){
                        $newSocialUser->country = $user->user['address']['country'];
                    }else {
                        $newSocialUser->country = 'Sri Lanka';
                    }*/

                    $newSocialUser->profile_pic = $user->avatar_original;


                    $newSocialUser->confirmation_code = NULL;
                    $newSocialUser->password = bcrypt(str_random(16));
                    $newSocialUser->save();



                    $socialData = new Social;
                    $socialData->social_id = $user->id;
                    $socialData->user_id = $newSocialUser->id;
                    $socialData->provider= $provider;
//                    $socialData->url =
//                    $socialData->data = $user;
                    $socialData->save();

                    $socialUser = $newSocialUser;

                }

                elseif($provider == 'google'){

                    //There is no combination of this social id and provider, so create new one
                    $newSocialUser = new User;
                    $newSocialUser->email = $email;
//                    $name = explode(' ', $user->name);

                    $newSocialUser->first_name = $user->user['name']['givenName'];

                    if (count($user->user['name']['familyName'])) {
                        $newSocialUser->last_name = $user->user['name']['familyName'];
                    }
                    else{
                        $newSocialUser->last_name = $user->user['name']['givenName'];
                    }

//                    $newSocialUser->gender = $user->user['gender'] == 'male' ? 1 : 0;



                    $newSocialUser->profile_pic = $user->avatar_original;


                    $newSocialUser->password = bcrypt(str_random(16));
                    $newSocialUser->confirmation_code = NULL;
                    $newSocialUser->save();


                    $socialData = new Social;
                    $socialData->social_id = $user->id;
                    $socialData->user_id = $newSocialUser->id;
                    $socialData->provider= $provider;
//                    $socialData->data = $user;
                    $socialData->save();


                    $socialUser = $newSocialUser;

                }

                else
                {
                    return redirect()->to('/login')
                        ->with('message','Invalid Social login or registration. Please try again by allowing the required permissions or register now by filling the registration form.')
                        ->with('status', 'danger');
                }



                $redirect_path = '/user/'.$newSocialUser->id;
                $special_msg = "Welcome to Dimento. Update your profile and make it look better.";
            }
            else {

                //Load this existing social user
                $socialUser = $sameSocialId->user;

            }

        }

        auth()->login($socialUser, true);

        return redirect($redirect_path)->with('update_profile', $special_msg);



    }



}
