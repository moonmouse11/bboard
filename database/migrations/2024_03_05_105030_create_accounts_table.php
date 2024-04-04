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
        Schema::create('accounts', static function (Blueprint $table) {
            $table->string('email')->primary();
            $table->json('socials');
            $table->foreignId('user_id')->constrained()
                ->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::table('users', static function (Blueprint $table) {
            $table->string('accounts')->unique();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', static function (Blueprint $table) {
            $table->dropIndex('users_accounts_unique');
            $table->dropColumn('accounts');
        });
        Schema::dropIfExists('accounts');
    }
};
