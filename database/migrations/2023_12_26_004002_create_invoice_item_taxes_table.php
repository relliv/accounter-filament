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

        Schema::create('invoice_item_taxes', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('invoice_id');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->integer('invoice_item_id');
            $table->foreign('invoice_item_id')->references('id')->on('invoice_items');
            $table->integer('tax_id');
            $table->foreign('tax_id')->references('id')->on('taxes');
            $table->string('name');
            $table->double('amount');
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
        Schema::dropIfExists('invoice_item_taxes');
    }
};
