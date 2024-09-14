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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string ('first_name', 50);
            $table->string ('last_name', 50);
            $table->date   ('date_birth');
            $table->string ('address', 100);
            $table->string ('mobile_phone', 10)->unique();
            $table->string ('email', 100)->unique();
            $table->string ('password', 120);

            $table->unsignedBigInteger ('city_id')->nullable();
            $table->unsignedBigInteger('document_type_id')->nullable();
            $table->integer('document_number')->nullable();

            $table->foreign('city_id')->references('id')->on('cities')->nullable();
            $table->foreign('document_type_id')->references('id')->on('document_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
