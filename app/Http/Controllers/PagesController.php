<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Tblusers;
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
        $table_users->password=$password;
        $table_users->created_at=new \DateTime();
        $table_users->updated_at=new \DateTime();
        $table_users->save();
    }
    public function home(){
        return view('home');
    }

}
