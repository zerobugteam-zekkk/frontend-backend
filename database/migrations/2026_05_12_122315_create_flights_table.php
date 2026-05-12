<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number');
            $table->string('airline');
            $table->string('type'); // departure / arrival
            $table->string('city');
            $table->string('time', 5); // format HH:MM
            $table->string('gate')->default('-');
            $table->string('status')->default('SCHEDULED');
            $table->date('flight_date');
            $table->timestamps();

            $table->index(['type', 'flight_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
