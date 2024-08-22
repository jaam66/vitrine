<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('supports', function (Blueprint $table) {
            $table->id();
            $table->string('os')->default('OS_000000000000000');
            $table->string('sender');
            $table->unsignedBigInteger('equipment_id');
            $table->string('subject');
            $table->text('body');
            $table->timestamps();

            $table->foreign('equipment_id')
                ->references('id')
                ->on('equipments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supports');
    }
};