<?php
declare(strict_types=1);
use Illuminate\Database\Schema\Blueprint;
use Modules\User\Models\TeamUser;
use Modules\Xot\Database\Migrations\XotBaseMigration;

return new class() extends XotBaseMigration {
    protected ?string $model_class = TeamUser::class;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table): void {
                $table->id();
                $table->foreignId('team_id');
                $table->foreignId('user_id');
                $table->string('role')->nullable();
                $table->timestamps();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table): void {
                if (! $this->hasColumn('customer_id')) {
                    $table->string('customer_id')->nullable();
                }

                if ($this->hasIndex('team_id_user_id_unique')) {
                    $table->dropUnique('team_id_user_id_unique');
                }
                //$table->dropUnique('team_user_team_id_user_id_unique');
            }
        );
    }
};
