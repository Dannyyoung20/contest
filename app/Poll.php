<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    protected $fillable = [
        'poll_uid', 'title', 'video_url', 'description', 'start_date', 'expiry_date'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }


}
