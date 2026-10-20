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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('agency_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('tour_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->date('tour_start_date')->nullable();
            $table->date('tour_end_date')->nullable();
            $table->foreignId('client_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('flight_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->foreignId('hotel_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();
            $table->date('hotel_check_in')->nullable();
            $table->date('hotel_check_out')->nullable();
            $table->string('room_type')->nullable();
            $table->decimal('price_per_night', 10, 2)
                ->default(0);
            $table->integer('hotel_days')->nullable();
            $table->integer('hotel_nights')->nullable();
            $table->decimal('hotel_total', 10, 2)
                ->default(0);

            $table->string('booking_reference')->unique();

            $table->enum('status', [
                'pending',
                'confirmed',
                'cancelled',
                'completed'
            ])->default('pending');

            $table->decimal('amount', 10, 2)
                ->default(0);

            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
