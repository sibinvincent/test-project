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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transaction_type_id')->unsigned();
            $table->bigInteger('source_wallet_id')->unsigned()->nullable();
            $table->bigInteger('target_wallet_id')->unsigned()->nullable();
            $table->bigInteger('transaction_status_id')->unsigned();
            $table->float('amount')->default(0);
            $table->float('source_wallet_balance')->default(0);
            $table->float('target_wallet_balance')->default(0);
            $table->timestamps();

            $table->foreign('transaction_type_id')->references('id')->on('transaction_types');
            $table->foreign('source_wallet_id')->references('id')->on('wallets');
            $table->foreign('target_wallet_id')->references('id')->on('wallets');
            $table->foreign('transaction_status_id')->references('id')->on('transaction_statuses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
