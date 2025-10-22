<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateContactsTable.
 */
return new class () extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->increments('id');
                $table->string('email')->nullable();
                $table->string('mobile_phone')->nullable();
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('email')) {
                    $table->string('email')->nullable();
                }

                if (! $this->hasColumn('mobile_phone')) {
                    $table->string('mobile_phone')->nullable();
                }

                if (! $this->hasColumn('sms_sent_at')) {
                    $table->dateTime('sms_sent_at')->nullable();
                    $table->integer('sms_count')->nullable();
                    $table->dateTime('mail_sent_at')->nullable();
                    $table->integer('mail_count')->nullable();
                }

                if (! $this->hasColumn('survey_pdf_id')) {
                    $table->string('survey_pdf_id')->nullable();
                }

                if (! $this->hasColumn('survey_id')) {
                    $table->string('survey_id')->index()->nullable();
                }


                if (! $this->hasColumn('token')) {
                    $table->string('token')->nullable();
                }

                if (! $this->hasColumn('first_name')) {
                    $table->string('first_name')->nullable();
                }

                if (! $this->hasColumn('last_name')) {
                    $table->string('last_name')->nullable();
                }

                if (! $this->hasColumn('attribute_1')) {
                    for ($i = 1; $i < 15; $i++) {
                        $fieldname = 'field'.$i;
                        $fieldname_new = 'attribute_'.$i;
                        if ($this->hasColumn($fieldname)) {
                            $table->renameColumn($fieldname, $fieldname_new);
                        } else {
                            $table->string($fieldname_new)->nullable();
                        }
                    }
                }

                if ($this->hasColumn('lang')) {
                    $table->renameColumn('lang', 'language');
                }

                if ($this->hasColumn('language') && ! $this->hasColumn('lang')) {
                    // $table->renameColumn('lang', 'language');
                }

                if (! $this->hasColumn('usesleft')) {
                    $table->string('usesleft')->nullable();
                }

                if (! $this->hasColumn('sms_status_code')) {
                    $table->string('sms_status_code')->nullable();
                    $table->string('sms_status_txt')->nullable();
                }

                if (! $this->hasColumn('duplicate_count')) {
                    $table->integer('duplicate_count')->nullable();
                }

                if (! $this->hasColumn('order_column')) {
                    $table->integer('order_column')->nullable();
                }

                //if (! $this->hasColumn('usersleft')) {
                //    $table->integer('usersleft')->nullable();
                //}
                // -------- Index -----------------
                //if (! $this->hasIndex('token')) {
                //    $table->index('token');
                //}
            }
        );
    }

    // end up

    // end down
};
