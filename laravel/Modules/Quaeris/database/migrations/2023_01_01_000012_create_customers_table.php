<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\User\Models\Team;
use Modules\User\Models\User;
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateCustomersTable.
 */
return new class() extends XotBaseMigration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // -- CREATE --
        $this->tableCreate(
            static function (Blueprint $table): void {
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
                if (! $this->hasColumn('name')) {
                    $table->string('name')->nullable();
                }

                if (! $this->hasColumn('updated_at')) {
                    $table->timestamps();
                }

                if (! $this->hasColumn('team_id')) {
                    $table->foreignIdFor(
                        model: Team::class,
                        column: 'team_id'
                    );
                }
                if (! $this->hasColumn('user_id')) {
                    $table->foreignIdFor(
                        model: User::class,
                        column: 'user_id'
                    );
                }
                if (! $this->hasColumn('slug')) {
                    $table->string('slug')->nullable()->index();
                }
                $this->updateTimestamps($table);
                $this->updateUser($table);
            }
        );
    }

    // end up

    // end down
};
