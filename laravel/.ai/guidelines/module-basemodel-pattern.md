# Module BaseModel Pattern

## Critical Pattern: Module-Specific BaseModel

**IMPORTANT**: Each module has its own `BaseModel` class that extends `XotBaseModel`. All models in the module extend their module's `BaseModel`, never `XotBaseModel` directly.

## Pattern Structure

### 1. XotBaseModel (Core)
```php
<?php

declare(strict_types=1);

namespace Modules\Xot\Models;

use Illuminate\Database\Eloquent\Model;

// ✅ Core base functionality in Xot module
abstract class XotBaseModel extends Model
{
    use Updater;
    
    public static $snakeAttributes = true;
    protected $perPage = 30;
    
    // Core Xot functionality
}
```

### 2. Module BaseModel (Module-Specific)
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Models;

use Modules\Xot\Models\XotBaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Xot\Models\Traits\RelationX;
use Modules\Xot\Traits\Updater;

// ✅ Each module has its own BaseModel
abstract class BaseModel extends XotBaseModel
{
    use HasFactory;
    use RelationX;
    use Updater;
    
    // Module-specific shared functionality
    // Custom scopes, relationships, etc.
}
```

### 3. Concrete Models (Extend Module BaseModel)
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

// ✅ Correct - extend module's BaseModel
class User extends BaseModel
{
    protected $fillable = ['name', 'email'];
    
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
}

// ❌ Wrong - never extend XotBaseModel directly
class User extends XotBaseModel
{
    // Don't do this
}

// ❌ Wrong - never extend Laravel Model directly  
class User extends Model
{
    // Don't do this
}
```

## Special Cases

### BaseUser Pattern
For User models, there's an additional layer:

```php
<?php

declare(strict_types=1);

namespace Modules\User\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Xot\Contracts\UserContract;

// ✅ BaseUser extends Authenticatable for auth functionality
abstract class BaseUser extends Authenticatable implements UserContract
{
    use HasApiTokens;
    use HasFactory;
    use HasRoles;
    use HasUuids;
    use Notifiable;
    use RelationX;
    // Auth-specific functionality
}

// ✅ Concrete User extends BaseUser
class User extends BaseUser
{
    public $connection = 'user';
    
    public function canAccessSocialite(): bool
    {
        return true;
    }
}
```

## Module Examples

### User Module
```
Modules/User/Models/
├── BaseModel.php      (extends XotBaseModel)
├── BaseUser.php       (extends Authenticatable)  
├── User.php           (extends BaseUser)
├── Team.php           (extends BaseModel)
└── Membership.php     (extends BaseModel)
```

### Setting Module  
```
Modules/Setting/Models/
├── BaseModel.php      (extends XotBaseModel)
├── Setting.php        (extends BaseModel)
└── DatabaseConnection.php (extends BaseModel)
```

### Limesurvey Module
```
Modules/Limesurvey/Models/
├── BaseModel.php      (extends XotBaseModel)
├── LimeSurvey[ID].php (extends BaseModel) - dynamic
└── LimeTokens[ID].php (extends BaseModel) - dynamic
```

## Benefits of This Pattern

### 1. Module Isolation
- Each module can add its own shared functionality
- Changes don't affect other modules
- Clean separation of concerns

### 2. Consistent Inheritance Chain
```php
Model (Laravel)
└── XotBaseModel (Xot core functionality)
    └── BaseModel (Module-specific functionality)
        └── ConcreteModel (Entity-specific functionality)
```

### 3. Easy Testing
```php
<?php

declare(strict_types=1);

use Modules\User\Models\User;
use Modules\User\Models\BaseModel;

it('follows correct inheritance', function () {
    $user = User::factory()->create();
    
    // ✅ Test inheritance chain
    expect($user)->toBeInstanceOf(BaseModel::class);
    expect($user)->toBeInstanceOf(XotBaseModel::class);
    expect($user)->toBeInstanceOf(Model::class);
});
```

### 4. Factory Integration
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Database\Factories;

use Modules\[Module]\Models\User;
use Modules\Xot\Database\Factories\XotBaseFactory;

class UserFactory extends XotBaseFactory
{
    protected $model = User::class;
    
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
```

## Common Mistakes to Avoid

### ❌ Wrong Patterns
```php
// Don't extend XotBaseModel directly
class User extends XotBaseModel {}

// Don't extend Laravel Model directly  
class User extends Model {}

// Don't skip the module BaseModel
class User extends Authenticatable {}
```

### ✅ Correct Patterns
```php
// Always extend module's BaseModel
class User extends BaseModel {}

// For auth models, extend BaseUser (which extends Authenticatable)
class User extends BaseUser {}

// Module BaseModel extends XotBaseModel
abstract class BaseModel extends XotBaseModel {}
```

## Migration Guidelines

When creating new models:

1. **Check if module BaseModel exists** - if not, create it
2. **Extend module BaseModel** - never XotBaseModel directly  
3. **Add module-specific functionality to BaseModel** - shared across module
4. **Add entity-specific functionality to concrete model**

## Verification Checklist

- [ ] Module has `BaseModel` extending `XotBaseModel`
- [ ] All module models extend module `BaseModel`
- [ ] No models extend `XotBaseModel` directly
- [ ] No models extend Laravel `Model` directly
- [ ] Auth models use appropriate base class (BaseUser)
- [ ] Factories extend appropriate base factory