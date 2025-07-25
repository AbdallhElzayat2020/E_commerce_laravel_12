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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('small_description');
            $table->longText('description');
            $table->string('sku')->unique();
            $table->enum('status', ['active', 'inactive'])->default('active');


            $table->decimal('price', 12, 2);
            $table->decimal('discount', 12, 2);

            $table->date('available_for')->nullable();
            $table->date('start_discount')->nullable();
            $table->date('end_discount')->nullable();


            $table->boolean('manage_stock')->default(0);

            $table->integer('quantity');
            $table->integer('available_in_stock')->default(1);
            $table->integer('num_views');


            $table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
