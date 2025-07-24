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
        Schema::create('postjobs', function (Blueprint $table) {
             $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // company user
        $table->string('title');
        $table->text('description');
        $table->string('location');
        $table->decimal('salary', 10, 2);
        $table->date('deadline');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postjobs');
    }
};
