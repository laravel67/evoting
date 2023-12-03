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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('nisn_ketua')->unique();
            $table->string('nisn_wakil')->unique();
            $table->string('name_ketua');
            $table->string('name_wakil');
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->text('visi_misi');
            $table->foreignId('priode_id')->nullable();
            $table->integer('votes')->default(0);
            $table->string('lantik')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
