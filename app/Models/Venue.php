<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    use HasFactory;

    protected $table = "venues";

    protected $guarded = [];

    const VENUE_TYPES = ['lawn','hotel','resort','banquet','marquee','meeting_hall'];

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function venues()
    {
        return $this->hasMany(VenueService::class,'venue_id','user_id');
    }
}
