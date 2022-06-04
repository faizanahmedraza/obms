<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVenueServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumns('venues', ['venue_type', 'venue_name'])) {
            Schema::table('venues', function (Blueprint $table) {
                $table->dropColumn(['venue_type', 'venue_name']);
                $table->unique('user_id');
            });
        }
        Schema::create('venue_services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venue_id')->constrained('venues', 'user_id')->cascadeOnDelete();
            $table->string('venue_type');
            $table->string('venue_name');
            $table->string('slug');
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->unsignedInteger('price_per_hour')->nullable();
            $table->tinyInteger('is_vendors_included')->default(0);
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
        Schema::table('venues', function (Blueprint $table) {
            $table->dropUnique('venues_user_id_unique');
        });
        Schema::dropIfExists('venue_services');
    }
}
