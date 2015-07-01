<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Routing\Controller;
use App\Tblusers;
use Hash;
use Redirect;
use Session;
use App\Http\Requests\CreateLoginRequest;
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
        $table_users->password=Hash::make($pword);
        $table_users->save();
        $error="Successfully Saved Your Account";
        return view('login',compact('error'));
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
    public function login(CreateLoginRequest $request){
        $uname=$request->get('uname');
        $pword=$request->get('pword');
        //database transaction save
        $req=new Tblusers;
        $results=$req->all()->toArray();
        $error="Incorrect Username or Password!!!";
        /** @noinspection PhpUndefinedVariableInspection */
        /** @var $result STRING */
        foreach($results as $result){
            if(Hash::check($pword,$result['password']) && strcmp($uname,$result['username'])==0){
                Session::put('uname',$uname);
                return redirect('/home');
            }
        }
        return view('login',compact('error'));
    }
}
