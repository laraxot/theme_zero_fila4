<?php

declare(strict_types=1);

namespace Modules\Limesurvey\Database\Migrations;

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
                $table->id(); // Assuming you want an auto-incrementing primary key
                $table->string('old_id')->nullable();
                $table->string('survey_id')->nullable(); // Survey ID
                $table->string('question_id')->nullable(); // Survey ID
                $table->string('question_type', 4)->nullable(); // Survey ID
                $table->string('token')->nullable(); // Token from lime_tokens_<survey_id>
                $table->string('answer')->nullable(); // The answer value
                $table->string('value')->nullable(); // The value from the responses table
                $table->datetime('submitdate')->nullable(); // The submission date
                $table->string('fieldname')->nullable(); // Field name related to the response

                // Add any necessary indexes
                $table->index('survey_id');
                $table->index('question_id');
                $table->index('question_type');
                $table->index('token');
                $table->index('submitdate');
                $table->index('fieldname');
                $table->index('old_id');
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('old_id')) {
                    $table->string('old_id')->index()->nullable();
                }
                if (! $this->hasColumn('feedback')) {
                    $table->string('feedback')->index()->nullable();
                }
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
    }
};
