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
        Schema::create('portfolio_projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auth_id');
            $table->foreignId('category');
            $table->string('name')->nullable();
            $table->string('company')->nullable();
            $table->string('client')->nullable();
            $table->string('url')->nullable();
            $table->text('text')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('summary')->nullable();
            $table->string('slug');
            $table->softDeletes();
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
        Schema::dropIfExists('portfolio_projects');
    }
};
