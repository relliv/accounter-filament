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

        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->index();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->integer('currency_id')->index();
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->dateTime('billed_at');
            $table->double('amount');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('contact_id');
            $table->foreign('contact_id')->references('id')->on('contacts');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('bills');
    }
};
