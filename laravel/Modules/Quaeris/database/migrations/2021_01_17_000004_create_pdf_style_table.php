<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePdfStyleTable.
 */
return new class() extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->increments('id');
                $table->nullableMorphs('style');
                $table->string('color')->nullable();
                $table->string('bg_color')->nullable();
                $table->string('font_family')->nullable();
                $table->string('font_size')->nullable();
                $table->string('font_style')->nullable();
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('backtop')) {
                    $table->string('backtop')->nullable();
                    $table->string('backbottom')->nullable();
                    $table->string('backleft')->nullable();
                    $table->string('backright')->nullable();
                }

                if (! $this->hasColumn('font_size_question')) {
                    $table->string('font_size_question')->nullable();
                }
            }
        );
    }
};
