<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Routing\Controller;
use App\Tblusers;
use Hash;
use Redirect;
use Session;
class PagesController extends Controller
{

    public function index(){
        return view('welcome');
    }
    public function register(){

        $uname=Request::get('uname');
        $pword=Request::get('pword');
        $table_users=new Tblusers;
        $table_users->username=$uname;
        $table_users->password=md5($pword);
        $table_users->save();
    }
    public function showSignUp(){
        return view('register');
    }
    public function home(){
        return view('home');
    }
    public function showLogin(){
        return view('login');
    }
    public function showGallery(){
        return view('gallery');
    }
    public function login(){
        $uname=Request::get('uname');
        $pword=Request::get('pword');
        //database transaction save
        $req=new Tblusers;
        $results=$req->all()->toArray();
        $error="Incorrect Username or Password!!!";
        /** @noinspection PhpUndefinedVariableInspection */
        /** @var $result STRING */
        foreach($results as $result){
            $hash_pass=md5($pword);
            if((strcmp($hash_pass,$result['password'])==0) && strcmp($uname,$result['username'])==0){
                Session::put('uname',$uname);
                return redirect('/home');
            }
            else{
                return view('login',compact('error'));
            }
        }

    }
}
