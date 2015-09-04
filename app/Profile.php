<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;

class Profile extends Model
{
    protected $table="profile";
    protected $fillable=['email','fname','mname','lname','address','city','birthday','about_me','prof_pic','mime'];
    protected $dates=['birthday','created_at'];
    protected $hidden=['_token'];
    //mutators
    public function setBirthdayAttribute($date){
        $this->attributes['birthday']=Carbon::parse($date);
    }
    public function setCreatedAtAttribute($date){
        $this->attributes['created_at']=Carbon::createFromFormat('Y-m-d H:i:s',$date);
    }
}
