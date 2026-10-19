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
        Schema::create('flights', function (Blueprint $table) {
            $table->id();

            $table->foreignId('agency_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('flight_number');

            $table->string('airline')->nullable();

            $table->string('origin');
            $table->string('destination');

            $table->dateTime('departure_date');
            $table->dateTime('arrival_date');

            $table->decimal('price', 10, 2)
                ->default(0);

            $table->enum('status', [
                'scheduled',
                'boarding',
                'airborne',
                'delayed',
                'landed',
                'cancelled'
            ])->default('scheduled');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};
