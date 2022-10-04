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
        Schema::create('personal_areas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('hire_btn');
            $table->string('hire_link');
            $table->string('hire_icon');
            $table->string('project_btn');
            $table->string('project_link');
            $table->string('project_icon');
            $table->string('designation_1')->nullable();
            $table->string('designation_2')->nullable();
            $table->string('designation_3')->nullable();
            $table->string('designation_4')->nullable();
            $table->string('designation_5')->nullable();
            $table->string('image');
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
        Schema::dropIfExists('personal_areas');
    }
};
