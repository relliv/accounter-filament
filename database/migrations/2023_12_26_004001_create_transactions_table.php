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

        Schema::create('transactions', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->integer('company_id');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('type');
            $table->dateTime('paid_at');
            $table->double('amount');
            $table->string('currency_code');
            $table->double('currency_rate');
            $table->integer('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
            $table->integer('document_id')->nullable();
            $table->integer('contact_id')->nullable();
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->text('description')->nullable();
            $table->string('payment_method');
            $table->string('reference')->nullable();
            $table->integer('parent_id');
            $table->tinyInteger('reconciled');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->index(['company_id', 'type']);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
