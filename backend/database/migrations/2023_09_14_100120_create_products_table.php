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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("product_title");
            $table->string("product_name");
            $table->bigInteger("product_price");
            $table->string("product_capacity");
            $table->string("product_ram");
            $table->string("product_image");
            $table->bigInteger("product_amount")->default(1);
            $table->string("product_memory");
            $table->string("product_guarantee");
            $table->text("product_description");
            $table->unsignedBigInteger("product_category_id");
            $table->foreign("product_category_id")->references("id")->on("categories");
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
