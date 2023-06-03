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
        Schema::create('account_sells', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->bigInteger('might');
            $table->string('title');

            $table->float('stats_sword');
            $table->float('stats_bow');
            $table->float('stats_horse');

            $table->integer('heroes_payed')->nullable();
            $table->integer('artifacts')->nullable();
            $table->integer('skins')->nullable();
            $table->integer('troops')->nullable();

            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->string('image_5')->nullable();
            $table->string('image_6')->nullable();

            $table->float('value_sell')->nullable();
            $table->float('value_discount')->nullable();

            $table->float('value_sold')->nullable();
            $table->float('value_fee')->nullable();

            $table->boolean('elite_store')->nullable();

            $table->text('description')->nullable();

            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_sells');
    }
};
