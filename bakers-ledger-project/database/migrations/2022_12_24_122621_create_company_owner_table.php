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
        Schema::create('company_owner', function (Blueprint $table) {
            $table->foreignId('company_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('owner_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['company_id', 'owner_id']);
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
        Schema::dropIfExists('company_owner');
    }
};
