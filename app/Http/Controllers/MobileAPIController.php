<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobileAPIController extends Controller
{
    public function getCSRF(){
        return csrf_token();    
    }
}
