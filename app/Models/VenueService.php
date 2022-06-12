<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VenueService extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "venue_services";

    protected $guarded = [];

    public function venue(){
        return $this->belongsTo(Venue::class,'venue_id','user_id');
    }
}
