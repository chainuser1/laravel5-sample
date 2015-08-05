<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon;
class News extends Model
{
    protected $carbon;
    protected $table="news";
    protected $fillable=['title','slug','content','created_at'];
    protected $hidden=['_token'];
    protected $dates=['created_at'];
    public function scopeCreatedAt($query){
        $query->where('created_at','<=',Carbon::now());
    }
    public function setCreatedAt($date){
        $this->attributes['created_at']= Carbon::createFromFormat('Y-m-d H:i:s', $date);
    }
    public function scopeUnpublished($query){
        $query->where('created_at','>',Carbon::now());
    }
}
