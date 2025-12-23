<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateSurveyPdfsTable.
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
                $table->integer('customer_id')->nullable();
                $table->integer('survey_id')->nullable();
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('name')) {
                    $table->string('name')->nullable();
                }

                if (! $this->hasColumn('pdf_view')) {
                    $table->string('pdf_view');
                }

                if (! $this->hasColumn('logo')) {
                    $table->string('logo')->nullable();
                }

                if (! $this->hasColumn('email')) {
                    $table->string('email')->nullable();
                }

                if (! $this->hasColumn('schedule_days')) {
                    $table->integer('schedule_days')->nullable();
                }

                if (! $this->hasColumn('date_from')) {
                    $table->date('date_from')->nullable();
                }

                if (! $this->hasColumn('date_to')) {
                    $table->date('date_to')->nullable();
                }

                if (! $this->hasColumn('title')) {
                    $table->string('title')->nullable();
                    $table->string('subtitle')->nullable();
                }

                if (! $this->hasColumn('xls_field_1')) {
                    $table->string('xls_field_1')->nullable();
                    $table->string('xls_field_2')->nullable();
                    $table->string('xls_field_3')->nullable();
                    $table->string('xls_field_4')->nullable();
                    $table->string('xls_field_5')->nullable();
                }

                if ($this->hasColumn('xls_field_1')) {
                    $table->text('xls_field_1')->nullable()->change();
                    $table->text('xls_field_2')->nullable()->change();
                    $table->text('xls_field_3')->nullable()->change();
                    $table->text('xls_field_4')->nullable()->change();
                    $table->text('xls_field_5')->nullable()->change();
                }
                if (! $this->hasColumn('question_contact_email')) {
                    $table->string('question_contact_email')->nullable();
                }

                if (! $this->hasColumn('chart_engine')) {
                    $table->string('chart_engine')->default('jpgraph');
                }
                if ($this->hasColumn('title')) {
                    // $table->string('title')->nullable();
                    $table->text('title')->nullable()->change();
                }
                if (! $this->hasColumn('question_filter')) {
                    $table->string('question_filter')->nullable();
                    $table->string('question_filter_txt')->nullable();
                }

                if (! $this->hasColumn('allow_multiple_invite')) {
                    $table->boolean('allow_multiple_invite')->default(true);
                }

                if (! $this->hasColumn('xls_field_json')) {
                    $table->json('xls_field_json');
                }
            }
        );
    }

    // end up

    // end down
};
