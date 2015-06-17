<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests;
use Illuminate\Routing\Controller;
use App\Tblusers;
class PagesController extends Controller
{
    public function index(){
        $request=new Request;
        return view('welcome');
    }
    public function save(){

    }
    public function home(){
        return view('home');
    }

}
