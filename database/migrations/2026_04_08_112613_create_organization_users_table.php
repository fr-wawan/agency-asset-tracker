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
        Schema::create('organization_users', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->organizationId();
            $table->foreignUlid('user_id')
                ->constrained()
                ->cascadeOnDelete();
            $table->string('role');
            $table->foreignUlid('invited_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
            $table->timestamp('joined_at')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organization_users');
    }
};
