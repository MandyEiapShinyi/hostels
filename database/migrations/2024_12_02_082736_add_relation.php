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
        Schema::table('students', function (Blueprint $table) {
            // Add a foreign key to link the user with the image
            // $table->unsignedBigInteger('user_id')->nullable()->after('id');
            $table->unsignedBigInteger('address_id')->after("id");
            $table->foreign("address_id")->references("id")->on("addresses")->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->after("address_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
            $table->unsignedBigInteger('room_id')->after("date");
            $table->foreign("room_id")->references("id")->on("rooms")->onDelete('cascade');
            // Optionally, you can add a foreign key constraint to enforce referential integrity
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('address_id')->after("id");
            $table->foreign("address_id")->references("id")->on("addresses")->onDelete('cascade');
        });


        Schema::table('services', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after("id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
        });

        
        Schema::table('payment_receipts', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after("id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Drop the foreign key and the user_id column
            $table->dropForeign(['address_id']);
            $table->dropColumn('address_id');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            $table->dropForeign(['room_id']);
            $table->dropColumn('room_id');
        });

        Schema::table('rooms', function (Blueprint $table) {
            $table->dropForeign(['address_id']);
            $table->dropColumn('address_id');
        });

        Schema::table('services', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('payment_receipts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
