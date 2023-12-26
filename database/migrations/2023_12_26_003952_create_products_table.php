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
        Schema::disableForeignKeyConstraints();

        Schema::create('products', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('name');
            $table->string('sku')->nullable();
            $table->text('description')->nullable();
            $table->double('sale_price');
            $table->double('purchase_price');
            $table->integer('quantity');
            $table->integer('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('tax_id')->nullable();
            $table->foreign('tax_id')->references('id')->on('taxes');
            $table->tinyInteger('enabled');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->unique(['sku', 'deleted_at']);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
