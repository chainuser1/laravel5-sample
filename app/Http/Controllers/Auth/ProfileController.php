<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Session;
use App\Profile;
use Request;
class ProfileController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $email=Session::get('email');
        return view('auth.create_profile',array('email'=>$email));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $req)
    {
        if($req->ajax()){
            $email=$req->input('email');
            $title=$req->input('title');
            $fname=$req->input('fname');
            $mname=$req->input('mname');
            $lname=$req->input('lname');
            $birthday=strtotime($req->input('birthday'));
            $address='\''.$req->input('address').'\'';
            $about_me='\''.$req->input('about_me').'\'';
            $filename=md5($email);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
