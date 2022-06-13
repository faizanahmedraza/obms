<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceBooking extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = "service_bookings";

    protected $guarded = [];

    public function vendorService()
    {
        return $this->belongsTo(VendorService::class, 'vendor_service_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class,'customer_id','user_id');
    }
}
