<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Routing\Controller;
use App\Tblusers;
use App\Tblprofiles;
use Hash;
use Redirect;
use Session;
use View;
use App\Http\Requests\CreateLoginRequest;
use App\Http\Requests\CreateSignUpRequest;
class PagesController extends Controller
{

    public function index(){
        return view('welcome');
    }
    public function main(){
        return view('layout');
    }
    public function createProfile(){

    }


}
