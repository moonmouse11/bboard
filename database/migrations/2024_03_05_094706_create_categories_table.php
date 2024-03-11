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
        Schema::create('categories', function (Blueprint $table) {
            $table->string('title', 50)->primary();
            $table->text('description');
            $table->bigInteger('parent_id');
            $table->foreign('parent_id')->references('id')
                ->on('categories')->restrictOnDelete();
            $table->timestamps();
        });

        Schema::table('bbs', function (Blueprint $table){
            $table->string('category', 50);
            $table->foreign('category')->references('title')
                ->on('categories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bbs', function (Blueprint $table) {
            $table->dropColumn('category');
        });
        Schema::dropIfExists('categories');
    }
};
