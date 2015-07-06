<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tblprofiles extends Model
{
    protected $table="tblprofiles";
    protected $fillable=[
        'username',
        'firstname',
        'lastname',
        'email',
        'birthday',
        'sex'
    ];
}
