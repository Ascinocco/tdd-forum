<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $guarded = [];

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

    /**
     * Defines the relation ship between the thread and user
     * in this case the thread belongs to a user
     * @return void
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Add's a reply to the current thread
     *
     * @return void
     */
    public function addReply($reply)
    {
        // this create and associates the reply with the thread
        $this->replies()->create($reply);
    }
}
