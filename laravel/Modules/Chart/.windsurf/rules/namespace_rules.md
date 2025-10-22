---
trigger: manual
description:
globs:
------------------------------------------|-------------------------------------|
| `Modules/Rating/app/Models/`                | `Modules\Rating\Models`             |
| `Modules/Rating/app/Http/Controllers/`      | `Modules\Rating\Http\Controllers`   |
| `Modules/Rating/app/Providers/`             | `Modules\Rating\Providers`          |
| `Modules/Rating/app/Datas/`                 | `Modules\Rating\Datas`              |
| `Modules/Rating/app/Actions/`               | `Modules\Rating\Actions`            |
| `Modules/Rating/app/Filament/Resources/`    | `Modules\Rating\Filament\Resources` |
| `Modules/Rating/app/Filament/Pages/`        | `Modules\Rating\Filament\Pages`     |

## Import corretti

```php
// ✅ CORRETTO - Importazioni esplicite
use Modules\User\Models\User;
use Modules\Article\Models\Article;

// ❌ EVITARE - Alias non necessari
use Modules\User\Models\User as UserModel;
```

## Composizione Namespace nei Service Provider

```php
<?php

namespace Modules\Rating\Providers;

use Modules\Xot\Providers\XotBaseServiceProvider;

class RatingServiceProvider extends XotBaseServiceProvider
{
    public string $name = 'Rating';
    protected string $module_dir = __DIR__;
    protected string $module_ns = __NAMESPACE__;
    
    // implementazione...
}
``` 