<?php namespace App\Http\Controllers;

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
    public function _construct(){
        $this->middleware('auth');
    }
    public function showDashBoard(){

    }
    public function showUsers(){
        return view('control-panel.users');
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