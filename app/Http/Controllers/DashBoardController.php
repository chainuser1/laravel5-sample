<?php namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\DB;
use Session;
class DashBoardController extends Controller {
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
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
        $users=User::all()->toArray();
        return view('control-panel.users',compact('users'));
    }
    public function showRoles(){

    }
    public function showForms(){

    }
    public function showFeedBack(){

    }
    public function showSettings(){

    }
}