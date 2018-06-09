<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Return the polls associated with a user.
     *
     * @return array
     */
    public function polls() {
        return $this->hasMany('App\Polls');
    }



    // USERS
    // id
    // fullname
    // email
    // password
    // role
    // timestamps

    // POLLS
    // id
    // user_id - FK
    // title
    // description
    // expiry date-time
    // timestamp

    // VIDEO
    // id
    // user_id - FK
    // poll_id - FK
    // title
    // description
    // tags
    // file_name
    // youtube_video_id
    // timestamps

    // VOTES
    // id
    // user_id - FK
    // poll_id - FK
    // video_id - FK
    // subscription_id - FK
    // counts 

    // SUBSCRIPTIONS
    // id
    // units
    // price
    
    // PAYMENT
    // id
    // user_id
    // poll_id
    // subscription_id
    // amount
    // count

    // RESULTS
    // id
    // poll_id - FK
    // user_id - FK
    // video_id - FK
    // final_score - FK ()


    // Relationships
    // User -> Video = 1 to M
    // User -> Poll = 1 to M
    // User -> Vote = M to M
    
}
