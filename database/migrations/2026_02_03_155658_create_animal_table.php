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
        Schema::create('animal', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->enum('tipus',['gos', 'gat', 'conill', 'rata']);
            $table->decimal('pes', 5, 2);
            $table->string('enfermetat')->nullable();
            $table->text('comentaris')->nullable();
            $table->foreignId('id_persona')->constrained('propietari')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animal');
    }
};
