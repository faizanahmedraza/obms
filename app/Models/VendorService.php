<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorService extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "vendor_services";

    protected $guarded = [];

    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id','user_id');
    }
}
