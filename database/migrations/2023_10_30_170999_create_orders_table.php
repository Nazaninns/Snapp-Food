<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('restaurant_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamp('pay')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreignId('address_id')->constrained()->cascadeOnDelete();
            $table->enum('situation',['pending','making','send','delivered'])->default('pending');
            $table->unsignedDecimal('total_price');
            $table->integer('discounts');
            $table->unsignedInteger('delivery_cost');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
