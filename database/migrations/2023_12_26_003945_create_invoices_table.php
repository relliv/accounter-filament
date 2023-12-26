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

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->string('invoice_number');
            $table->string('order_number')->nullable();
            $table->string('status');
            $table->dateTime('invoiced_at');
            $table->dateTime('due_at');
            $table->double('amount');
            $table->string('currency_code');
            $table->double('currency_rate');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('contact_id');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->string('contact_name');
            $table->string('contact_email')->nullable();
            $table->string('contact_tax_number')->nullable();
            $table->string('contact_phone')->nullable();
            $table->text('contact_address')->nullable();
            $table->text('notes')->nullable();
            $table->text('footer')->nullable();
            $table->integer('parent_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->unique(['company_id', 'invoice_number', 'deleted_at']);
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
