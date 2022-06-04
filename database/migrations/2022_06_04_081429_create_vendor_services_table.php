<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumns('vendors', ['service_type', 'service_name'])) {
            Schema::table('vendors', function (Blueprint $table) {
                $table->dropColumn(['service_type', 'service_name']);
                $table->unique('user_id');
            });
        }
        Schema::create('vendor_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendor_id')->constrained('vendors','user_id')->cascadeOnDelete();
            $table->string('service_type');
            $table->string('service_name');
            $table->string('slug');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('price_per_hour')->nullable();
            $table->text('additional_details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vendors', function (Blueprint $table) {
            $table->dropUnique('vendors_user_id_unique');
        });
        Schema::dropIfExists('vendor_services');
    }
}
