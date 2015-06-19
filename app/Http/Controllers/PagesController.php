<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Tblusers;
use Hash;
class PagesController extends Controller
{
    protected $req;
    protected $table_users;
    public function index(){
        $request=new Request;
        return view('welcome');
    }
    public function SignUp(){
        $req=new Request;
        $username=$req->input('uname');
        $password=$req->input('pword');
        $table_users=new Tblusers;
        $table_users->username=$username;
        $table_users->password=Hash::make($password);
        $table_users->created_at=new \DateTime();
        $table_users->updated_at=new \DateTime();
        $table_users->save();
    }
    public function home(){
        return view('home');
    }
    public function showLogin(){
        return view('login');
    }
}
