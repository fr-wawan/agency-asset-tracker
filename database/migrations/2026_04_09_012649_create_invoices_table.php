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
        Schema::create('invoices', function (Blueprint $table) {
            $table->ulidPrimaryKey();
            $table->organizationId();
            $table->foreignUlid('subscription_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('order_id')
                ->unique();
            $table->string('midtrans_transaction_id')
                ->nullable();
            $table->string('snap_token')
                ->nullable();
            $table->timestamp('snap_token_expires_at')
                ->nullable();
            $table->bigInteger('amount');
            $table->string('status');
            $table->timestamp('billing_period_start');
            $table->timestamp('billing_period_end');
            $table->timestamp('due_date');
            $table->timestamp('paid_at')
                ->nullable();
            $table->json('payload')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
