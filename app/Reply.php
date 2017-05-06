<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $guarded = [];

    /**
     * Defines eloquent relation ship between replies and users
     * A reply belongs to a user
     * 
     * Should note that because we are not calling the function user,
     * we must specify the foreign key we want for the owner lookup,
     * which in this case is user_id
     * 
     * @return void
     */
    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
