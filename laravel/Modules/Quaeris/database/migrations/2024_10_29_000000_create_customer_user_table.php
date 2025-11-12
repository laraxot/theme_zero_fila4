<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class() extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id();
                $table->foreignId('tenant_id');
                $table->uuid('user_id')->nullable()->index();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                // if (! $this->hasColumn('updated_by')) {
                //    $table->string('updated_by')->nullable();
                // }

                // $this->updateUser($table);
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
    }
};
