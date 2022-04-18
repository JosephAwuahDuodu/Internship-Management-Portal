<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_locations', function (Blueprint $table) {
            $table->id();
            $table->string("org_id");
            $table->string("region_id");
            $table->string("district_id")->nullable();
            $table->string("city")->nullable();
            $table->string("address")->nullable();
            $table->string("post_office")->nullable();
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
        Schema::dropIfExists('organization_locations');
    }
};
