<?php

namespace App\Modules\Event;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'address',
        'lat',
        'long',
        'start_date',
        'end_date'
    ];

    protected $guarded = [];

    //Add relationship between event and user (In other words each event belong to a user)
    public function creator()
    {
       // return $this->belongsTo(User, 'user_id');
        return $this->belongsTo(User::class, 'user_id');
    }
}
