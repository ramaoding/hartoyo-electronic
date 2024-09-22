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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('stock');
            $table->integer('sold');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            // change() tells the Schema builder that we are altering a table
            $table->integer('sold')->unsigned()->nullable()->change();
        });
        
        DB::table('products')->insert([
            ['name' => 'Laptop X', 'price' => 12000000, 'stock' => 15, 'sold' => 0, 'created_at' => Carbon::now()->toDateTimeString()],
            ['name' => 'Smartphone Y', 'price' => 7000000, 'stock' => 30, 'sold' => 0, 'created_at' => Carbon::now()->toDateTimeString()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
