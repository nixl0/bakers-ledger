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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('number', 255)->unique();
            $table->string('title', 2047);
            $table->foreignId('district_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('legal_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('since');
            $table->string('phone', 255);
            $table->string('email', 1023);
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
        Schema::dropIfExists('companies');
    }
};
