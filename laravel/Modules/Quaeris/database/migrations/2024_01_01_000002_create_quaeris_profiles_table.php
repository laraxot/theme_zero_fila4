<?php
/**
 * ----.
 */

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Quaeris\Models\Profile;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class() extends XotBaseMigration {
    protected ?string $model_class = Profile::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
                $table->id();
                $table->string('user_id', 36)->index()->nullable();
                // $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                // $table->char('gender',1)->nullable();
                // $table->string('gender', 1)->nullable();
                $table->enum('gender', ['m', 'f'])->nullable();
                $table->string('email')->nullable();
                $table->string('phone', 20)->nullable();
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('tax_code')) { // codice fiscale
                    $table->string('tax_code')->nullable();
                }

                if (! $this->hasColumn('vat_number')) { // partita iva
                    $table->string('vat_number')->nullable();
                }
                if (in_array($this->getColumnType('user_id'), ['int'])) {
                    $table->string('user_id', 36)->index()->nullable()->change();
                }
                $this->updateTimestamps(table: $table, hasSoftDeletes: true);
            }
        );
    }
};
