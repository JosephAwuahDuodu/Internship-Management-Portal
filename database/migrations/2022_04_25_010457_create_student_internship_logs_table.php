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
        Schema::create('student_internship_logs', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('offer_id');
            $table->text('log_text')->nullable();
            $table->boolean('supervisor_approval')->default(false);
            $table->date('supervisor_approval_date')->nullable();
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
        Schema::dropIfExists('student_internship_logs');
    }
};
