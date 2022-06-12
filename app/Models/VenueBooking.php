<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VenueBooking extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "venue_bookings";

    protected $guarded = [];

    public function venueService()
    {
        return $this->belongsTo(VenueService::class, 'venue_service_id', 'id');
    }
}
