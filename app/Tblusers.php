<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Tblusers extends Model
{
    //
    protected $table="tblusers";
    protected $fillable=[
        'lname',
        'fname',
        'email',
        'password'
    ];

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */

}
