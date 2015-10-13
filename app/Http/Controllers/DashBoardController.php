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
        $users=DB::table('users')->where('users.email','!=',Session::get('email'))->get();
        $no_of_users=0;//initialize counter to 1
        for($i=sizeof($users);$i>0;$i--)
            $no_of_users++;
        return view('control-panel.dashboard',array('no_of_users'=>$no_of_users));
    }
    public function showUsers(){
        $users=DB::table('users')->join('profile',function($join){
            $join->on('users.email','=','profile.email')->where('users.email','!=',Session::get('email'));
        })->get();
        return view('control-panel.users',compact('users'));
    }
    public function showRoles(){

       $admin=DB::table('users')->where('type','=','admin')->get();
        $no_of_admin=sizeof($admin);
       $users=DB::table('users')->where('type','=','user')->get();
        $no_of_users=sizeof($users);
       return view('control-panel.roles')->with(['admin'=>$no_of_admin,'users'=>$no_of_users]);
    }
    public function showForms(){

    }
    public function showFeedBack(){

    }
    public function showSettings(){

    }
}