<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class MacroServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerBlueprintMacros();
    }

    private function registerBlueprintMacros(): void
    {
        Blueprint::macro('organizationId', function (bool $nullable = false) {
            /** @var Blueprint $this */
            $col = $this->foreignUlid('organization_id')->constrained();
            return $nullable ? $col->nullOnDelete() : $col->cascadeOnDelete();
        });

        Blueprint::macro('createdBy', function () {
            /** @var Blueprint $this */
            $this->foreignUlid('created_by')->nullable()->constrained('users')->nullOnDelete();
        });

        Blueprint::macro('updatedBy', function () {
            /** @var Blueprint $this */
            $this->foreignUlid('updated_by')->nullable()->constrained('users')->nullOnDelete();
        });

        Blueprint::macro('ulidPrimaryKey', function () {
            /** @var Blueprint $this */
            $this->ulid('id')->primary();
        });

        Blueprint::macro('blamedBy', function () {
            /** @var Blueprint $this */
            $this->createdBy();
            $this->updatedBy();
        });
    }
}
