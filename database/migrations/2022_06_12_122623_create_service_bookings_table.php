<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('customers', 'user_id')) {
            Schema::table('customers', function (Blueprint $table) {
                $table->unique('user_id');
            });
        }
        Schema::create('service_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers', 'user_id')->cascadeOnDelete();
            $table->foreignId('vendor_service_id')->nullable()->constrained('vendor_services', 'id')->cascadeOnDelete();
            $table->date('date');
            $table->string('start_time');
            $table->string('end_time');
            $table->double('total_price');
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
        Schema::dropIfExists('service_bookings');
    }
}
