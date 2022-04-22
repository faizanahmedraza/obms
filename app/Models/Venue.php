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

}