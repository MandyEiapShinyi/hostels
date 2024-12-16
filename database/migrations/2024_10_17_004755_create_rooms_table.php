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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            // $table->foreignId("address_id")->constrained("addresses")->onDelete("set null");
            // $table->foreignId('room_id')->nullable()->constrained()->onDelete('set null');
            $table->string('room_name');
            $table->json('furniture');
            $table->string('room_fee');
            $table->string('person_quantity');
            $table->string('image');
            $table->string('details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
