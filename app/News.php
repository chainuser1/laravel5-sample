<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
class News extends Model
{
    protected $table="news";
    protected $fillable=['title','slug','content','created_at'];
    protected $hidden=['_token'];
    protected $dates=['created_at'];
    public function scopeCreatedAt($query){
        $query->where('created_at','<=',Carbon::now())->orderBy('created_at','DESC');
    }
    public function setTitleAttribute($title){
        $this->attributes['title']=ucwords($title);
    }
    public function setCreatedAtAttribute($date){
        $this->attributes['created_at']= Carbon::parse($date);
    }
//    public function setSlugAttribute($value){
//        $this->attributes['slug']=strtolower(preg_replace('/[\s\$\.\+\'\"]+/','-',$value));
//    }
    public function scopeUnpublished($query){
        $query->where('created_at','>',Carbon::now())->orderBy('created_at','DESC');
    }

    public function setContentAttribute($content){
        $this->attributes['content']=htmlentities($content);
    }
    public function scopeSearchByTitle($query,$title){
        return $query->where('title','LIKE','%'.$title.'%')->latest('created_at');
    }
    public function searchBySlug($value){
        return News::where('slug','=',$value)->get();
    }

}
