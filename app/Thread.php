<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /**
     * Returns string representation of thread
     *
     * @return void
     */
    public function path()
    {
        return '/threads/' . $this->id;
    }

    /**
     * Creates relationship between thread and its replies
     * This uses eloquent
     * 
     * @return void
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}
