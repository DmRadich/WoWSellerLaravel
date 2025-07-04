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
        Schema::create('gold', function (Blueprint $table) {
            $table->id();
            $table->string('server')->default('any');
            $table->string('faction');
            $table->text('description');
            $table->string('seller_id')->constrained('users')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gold');
    }
};
