<?php

// @see App\Providers\MacroServiceProvider
// This file is for IDE support only and is not loaded at runtime.

namespace Illuminate\Database\Schema;

/**
 * @see \App\Providers\MacroServiceProvider
 */
class Blueprint
{
    public function organizationId(bool $nullable = false): ForeignKeyDefinition {}
    public function createdBy(): void {}
    public function updatedBy(): void {}
    public function blamedBy(): void {}
}
