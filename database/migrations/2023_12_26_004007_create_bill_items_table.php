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

        Schema::create('bill_items', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('bill_id');
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->integer('item_id')->nullable();
            $table->foreign('item_id')->references('id')->on('items');
            $table->string('name');
            $table->string('sku')->nullable();
            $table->double('quantity');
            $table->double('price');
            $table->double('total');
            $table->double('tax');
            $table->double('discount_rate');
            $table->string('discount_type');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_items');
    }
};
