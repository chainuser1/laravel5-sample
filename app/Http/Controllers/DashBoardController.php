<?php namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;
class DashBoardController extends Controller {

    /**
     * Show the application dashboard to the user.
     * @return Response
     */
    public function index()
    {
        return view('dashboard');
    }
    public function showDashBoard(){
        return view('control-panel.dashboard');
    }
    public function showUsers(){
        $users=DB::table('users')->join('profile',function($join){
            $join->on('users.email','=','profile.email')->where('users.email','!=',Session::get('email'));
        })->get();
        return view('control-panel.users',compact('users'));
    }
    public function showRoles(){
        return "Roles";
    }
    public function showForms(){

    }
    public function showFeedBack(){

    }
    public function showSettings(){

    }
}