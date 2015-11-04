<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
class News extends Model
{
    protected $table="news";
    protected $fillable=['user_id','title','slug','content','author','created_at'];
    protected $hidden=['_token'];
    protected $dates=['created_at'];
    public function scopeCreatedAt($query){
        $query->where('created_at','<=',Carbon::now())->orderBy('created_at','DESC');
    }
    public function setTitleAttribute($title){
        $this->attributes['title']=strtolower($title);
    }
    public function setCreatedAtAttribute($date){
        $this->attributes['created_at']= Carbon::parse($date);
    }
    public function setSlugAttribute($value){
        $this->attributes['slug']=strtolower(preg_replace('/[\s\$\.\+\'\"\?]+/','-',$value));
    }
    public function scopeUnpublished($query){
        $query->where('created_at','>',Carbon::now())->orderBy('created_at','DESC');
    }

    public function setContentAttribute($content){
        $this->attributes['content']=htmlentities($content);
    }
    public function scopeSearchByTitle($query,$title){
        $title=strtolower($title);
        return $query->whereRaw('title like ?',array("%$title%"));
    }
    public function scopeSearchBySlug($query, $slug){
        return $query->where('slug','=',$slug)->get();
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

}
