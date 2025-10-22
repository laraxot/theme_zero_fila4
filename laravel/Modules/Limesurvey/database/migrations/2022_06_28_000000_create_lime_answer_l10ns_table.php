<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLimeAnswerL10nsTable.
 */
class CreateLimeAnswerL10nsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->increments('id');
                $table->integer('aid');
                $table->string('answer');
                $table->string('language');
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                /* if (! $this->hasColumn('f1irst_name')) {
                       $table->string('f1irst_name')->nullable();
                   }*/
            }
        );
    }

    // end up

    // end down
}
