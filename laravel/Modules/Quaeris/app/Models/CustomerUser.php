<?php

declare(strict_types=1);

namespace Modules\Quaeris\Models;

use Modules\User\Models\TenantUser;

class CustomerUser extends TenantUser
{
    /** @var string */
    protected $connection = 'quaeris';

    /** @var string */
    protected $table = 'customer_user';

    /** @var list<string> */
    protected $fillable = [
        'customer_id',
        'tenant_id',
        'user_id',
    ];
}
