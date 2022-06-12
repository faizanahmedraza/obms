<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = "vendors";

    protected $guarded = [];

    const VENDOR_TYPES = ['food', 'makeup', 'groom_wear', 'bridal_wear', 'rental_cars', 'invites_and_gifts', 'jewellery_and_accessories', 'decor_and_florists', 'photographers_and_choreographers'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(VendorService::class,'vendor_id','user_id');
    }
}
