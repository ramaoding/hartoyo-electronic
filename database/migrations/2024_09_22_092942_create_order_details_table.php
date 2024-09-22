<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->integer('orderId');
            $table->integer('productsId');
            $table->integer('quantity');
            $table->timestamps();
        });
        
        DB::table('order_details')->insert([
            ['orderId' => 1, 'productsId' => 1, 'quantity' => 1, 'created_at' => Carbon::now()->toDateTimeString()],
            ['orderId' => 1, 'productsId' => 2, 'quantity' => 1,'created_at' => Carbon::now()->toDateTimeString()],
            ['orderId' => 2, 'productsId' => 1, 'quantity' => 1,'created_at' => Carbon::now()->toDateTimeString()],
            ['orderId' => 2, 'productsId' => 2, 'quantity' => 1,'created_at' => Carbon::now()->toDateTimeString()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
