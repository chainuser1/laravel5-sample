<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable=['name'];

    /** A tag may belong to many news
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany\
     */
    public function news(){
        return $this->hasMany('App\News');
    }
}
