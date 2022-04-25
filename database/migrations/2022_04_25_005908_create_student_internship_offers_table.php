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
        Schema::create('student_internship_offers', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('offer_id');
            $table->boolean('approval_status')->default(false)->comment('True if organization approves request'); // ONCE APPROVED, STUDENT SHOULD NOT BE ABLE TO APPLY FOR ANY OFFER AGAIN
            $table->boolean('rejected')->default(false)->comment('True if organization rejects request');
            $table->boolean('active_status')->default(false);
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
        Schema::dropIfExists('student_internship_offers');
    }
};
