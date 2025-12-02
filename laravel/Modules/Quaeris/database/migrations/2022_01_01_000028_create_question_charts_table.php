<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Chart\Models\MixedChart;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateQuestionChartsTable.
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
                // $table->integer('customer_id')->nullable();
                // $table->integer('survey_id')->nullable();
                $table->integer('survey_pdf_id')->nullable();
                $table->string('question')->nullable();
                $table->string('subquestion')->nullable();
                $table->string('width')->nullable();
                $table->string('height')->nullable();
                $table->string('group_by')->nullable();
                $table->integer('take')->nullable();
                $table->string('chart_type')->nullable();
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('sort_by')) {
                    $table->string('sort_by')->nullable();
                    $table->integer('pos')->nullable();
                }
                if (! $this->hasColumn('max')) {
                    $table->decimal('max')->nullable();
                    $table->decimal('min')->nullable();
                }

                if (! $this->hasColumn('img_src')) {
                    $table->string('img_src')->nullable();
                    $table->timestamp('generated_at')->nullable();
                }

                if (! $this->hasColumn('col_size')) {
                    $table->integer('col_size')->default(4)->nullable();
                }

                if (! $this->hasColumn('question_txt')) {
                    $table->string('question_txt')->nullable();
                }

                if (! $this->hasColumn('answer_value')) {
                    $table->string('answer_value')->nullable();
                }

                if (! $this->hasColumn('title')) {
                    $table->string('title')->nullable();
                    $table->string('subtitle')->nullable();
                }
                if (! $this->hasColumn('answer_value_txt')) {
                    $table->string('answer_value_txt')->nullable();
                    $table->string('answer_value_no_txt')->nullable();
                }

                if (! $this->hasColumn('group_name')) {
                    $table->string('group_name')->nullable();
                }

                if (! $this->hasColumn('list_color')) {
                    $table->string('list_color')->nullable();
                }

                if (! $this->hasColumn('question_type')) {
                    $table->string('question_type')->nullable();
                    $table->string('sub_question_type')->nullable();
                }

                if (! $this->hasColumn('question_title')) {
                    $table->string('question_title')->nullable();
                }

                if ($this->hasColumn('sub_question_type')) {
                    $table->renameColumn('sub_question_type', 'subquestion_type');
                }

                if (! $this->hasColumn('page_type')) {
                    $table->string('page_type')->nullable();
                }

                if (! $this->hasColumn('data_type')) {
                    $table->string('data_type')->nullable();
                }

                if (! $this->hasColumn('add_nulls')) {
                    $table->string('add_nulls')->nullable();
                }

                if (! $this->hasColumn('interval')) {
                    $table->string('interval')->nullable();
                }

                if (! $this->hasColumn('show_on_pdf')) {
                    $table->boolean('show_on_pdf')->default(1);
                }

                if (! $this->hasColumn('show_tot_invited')) {
                    $table->boolean('show_tot_invited')->default(0);
                }

                if (! $this->hasColumn('field_name')) {
                    $table->string('field_name')->nullable();
                }

                if (! $this->hasColumn('group_title')) {
                    $table->string('group_title')->nullable();
                }
                if (! $this->hasColumn('mixed_chart_id')) {
                    $table->foreignIdFor(MixedChart::class, 'mixed_chart_id')->nullable()->index();
                }
            }
        );
    }
};
