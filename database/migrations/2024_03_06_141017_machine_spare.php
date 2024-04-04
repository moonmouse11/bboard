<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('machines', static function (Blueprint $table) {
            $table->id();
            $table->string('title', 30);
            $table->uuid();
            $table->timestamps();
        });

        Schema::create('spares', static function (Blueprint $table) {
            $table->id();
            $table->string('title', 30);
            $table->uuid();
            $table->foreignId('user_id')->constrained('users')->restrictOnDelete();
            $table->timestamps();
        });

        Schema::create('machine_spare', function (Blueprint $table) {
            $table->foreignId('machine_id')->constrained()->cascadeOnDelete();
            $table->foreignId('spare_id')->constrained()->cascadeOnDelete();
            $table->text('some_very_important_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('machine_spare');
        Schema::dropIfExists('machines');
        Schema::dropIfExists('spares');
    }
};
