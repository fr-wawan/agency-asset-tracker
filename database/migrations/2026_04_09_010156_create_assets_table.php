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
        Schema::create('assets', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->organizationId();
            $table->foreignUlid('client_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('type');
            $table->json('metadata')
                ->default('{}');
            $table->timestamp('expires_at')
                ->nullable()
                ->index();
            $table->timestamp('renewal_reminder_sent_at')
                ->nullable();
            $table->createdBy();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
