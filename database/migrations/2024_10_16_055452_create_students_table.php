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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId("address_id")->nullable()->constrained("addresses")->onDelete("set null");
            $table->foreignId("user_id")->nullable()->constrained("users")->onDelete("set null");
            $table->string('phone_number');
            $table->string('date');
            $table->foreignId("room_id")->nullable()->constrained("rooms")->onDelete("set null");
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
