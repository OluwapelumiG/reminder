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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('class');
            $table->string('venue');
            $table->string('frequency');
            $table->string('day')->nullable();
            $table->date('date')->nullable();
            $table->boolean('status')->default(1);
            $table->time('start');
            $table->time('end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
