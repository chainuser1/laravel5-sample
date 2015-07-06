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
    public function register(CreateSignUpRequest $request, Tblprofiles $profiles, Tblusers $users){
        //assignment
        $uname=$request->get('uname');
        $fname=$request->get('fname');
        $lname=$request->get('lname');
        $email=$request->get('email');
        $pword=$request->get('pword');
        $birthday=$request->get('birthday');
        $sex=(string)$request->get('sex');
        //model profile
        $profiles->username=$uname;
        $profiles->firstname=$fname;
        $profiles->lastname=$lname;
        $profiles->email=$email;
        $profiles->birthday=$birthday;
        $profiles->sex=$sex;
        $profiles->save();
        //model user
        $users->username=$uname;
        $users->password=Hash::make($pword);
        $users->save();
        return redirect('/login');
    }
    public function showSignUp(){
        return view('register');
    }
    public function home(){
        return view('home');
    }
    public function find($uname){
        if(Session::has('uname')){
            if(strcmp(Session::get('uname'),$uname)==0){
                return redirect('home/'.$uname);
            }
        }
        return view('/login');
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
        return redirect('/login',compact('error'));
    }

}
