<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Session;
use App\Profile;
use Illuminate\Http\Request;;
use File;
use Storage;
use Validator;
use Response;
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
//       if($req->ajax()){
            $email=$req->input('email');
            $title=$req->input('title');
            $fname=$req->input('fname');
            $mname=$req->input('mname');
            $lname=$req->input('lname');
            $birthday=$req->input('birthday');
            $address='\''.$req->input('address').'\'';
            $about_me='\''.$req->input('about_me').'\'';
            $file=$req->file('prof_pic');

            $data=array('email'=>$email,'title'=>$title,'fname'=>$fname,'mname'=>$mname,'lname'=>$lname,
                'birthday'=>$birthday,'address'=>$address,'prof_pic'=>$file);

            $validator=Validator::make($data,[
                'email'=>'required|email',
                'title'=>'required',
                'fname'=>'required|alpha',
                'mname'=>'required|alpha',
                'lname'=>'required|alpha',
                'birthday'=>'date|required',
                'prof_pic'=>'required|image'
            ]);
            if($validator->fails()){
                $errors=$validator->messages();
                return  Response::json($errors->all());
            }
            $extension = $file->getClientOriginalExtension();
            $mime=$file->getClientMimeType();
            $filename=md5(Session::get('email')).'.'.$extension;
            Storage::disk('local')->put($filename,File::get($file));
            $profile=new Profile;
            try{
                $newProf=$profile->create(['email'=>$email,'title'=>$title,'fname'=>$fname,'mname'=>$mname,'lname'=>$lname,
                    'birthday'=>$birthday,'address'=>$address,'about_me'=>$about_me,'prof_pic'=>$filename,'mime'=>$mime]);
                return 'Your Profile has been created.';
            }catch(\Exception $e)
            {
                echo 'An error occurred while creating your profile. Perhaps your profile already exists.';
            }

//        }
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
    public function loadProfPic($prof_pic){

            $email=$prof_pic;
            $user=Profile::where('email','=',$email)->first();
            $file=Storage::disk('local')->get($user->prof_pic);
            return response($file,200)->header('mime',$user->mime);

    }

}
