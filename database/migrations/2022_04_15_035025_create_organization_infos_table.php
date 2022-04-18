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
        Schema::create('organization_infos', function (Blueprint $table) {
            $table->id();
            $table->string("org_id");
            $table->string("primary_contact", 12);
            $table->string("other_contacts")->nullable();
            $table->string("email")->unique();
            $table->text("org_desc")->nullable();
            $table->boolean("active_status")->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_infos');
    }
};
