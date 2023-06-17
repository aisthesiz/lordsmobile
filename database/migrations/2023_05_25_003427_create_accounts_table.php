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
        Schema::create('accounts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id');
            $table->string('name')->nullable();
            $table->bigInteger('lord_account_id')->unique();
            $table->json('params')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('params_updated_at')->nullable();
            $table->timestamp('params_readed_at')->nullable();
            $table->timestamp('params_wrote_at')->nullable();
            $table->timestamp('time_start');
            $table->timestamp('time_end');
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('deactivated_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
