# Action Pattern - No Services

## No Service Classes

**CRITICAL**: This project does **NOT** use traditional Service classes. Instead, it uses the **Action Pattern** with `spatie/laravel-queueable-action` package.

## ❌ What We DON'T Use

### Traditional Service Classes
```php
// ❌ Don't create Service classes
<?php
namespace Modules\User\Services;

class UserService
{
    public function createUser(array $data): User
    {
        // Don't do this
    }
    
    public function updateUser(User $user, array $data): User
    {
        // Don't do this
    }
}
```

### Service Injection in Controllers
```php
// ❌ Don't inject services
class UserController extends Controller
{
    public function __construct(
        private UserService $userService  // Don't do this
    ) {}
}
```

## ✅ What We USE Instead: Actions

### Single Responsibility Actions
```php
<?php

declare(strict_types=1);

namespace Modules\User\Actions;

use Spatie\QueueableAction\QueueableAction;
use Modules\User\Models\User;

class CreateUserAction
{
    use QueueableAction;
    
    public function execute(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
```

### Queueable Actions
```php
<?php

declare(strict_types=1);

namespace Modules\User\Actions;

use Spatie\QueueableAction\QueueableAction;
use Modules\User\Models\User;

class SendWelcomeEmailAction
{
    use QueueableAction;
    
    public $queue = 'emails';
    
    public function execute(User $user): void
    {
        // Send welcome email
        Mail::to($user->email)->send(new WelcomeMail($user));
    }
}
```

### Complex Business Logic Actions
```php
<?php

declare(strict_types=1);

namespace Modules\Order\Actions;

use Spatie\QueueableAction\QueueableAction;
use Modules\Order\Models\Order;
use Modules\Payment\Actions\ProcessPaymentAction;
use Modules\Inventory\Actions\UpdateInventoryAction;
use Modules\Notification\Actions\SendOrderConfirmationAction;

class ProcessOrderAction
{
    use QueueableAction;
    
    public function execute(Order $order): void
    {
        // Process payment
        app(ProcessPaymentAction::class)->execute($order->payment);
        
        // Update inventory
        app(UpdateInventoryAction::class)->execute($order->items);
        
        // Send confirmation
        app(SendOrderConfirmationAction::class)->execute($order);
        
        // Update order status
        $order->update(['status' => 'processed']);
    }
}
```

## Action Organization

### Directory Structure
```
Modules/[Module]/Actions/
├── CreateUserAction.php
├── UpdateUserAction.php
├── DeleteUserAction.php
├── SendWelcomeEmailAction.php
└── User/
    ├── CreateUserProfileAction.php
    ├── UpdateUserPreferencesAction.php
    └── ValidateUserDataAction.php
```

### Nested Action Organization
```php
<?php
// Modules/User/Actions/User/CreateUserProfileAction.php

declare(strict_types=1);

namespace Modules\User\Actions\User;

use Spatie\QueueableAction\QueueableAction;
use Modules\User\Models\{User, UserProfile};

class CreateUserProfileAction
{
    use QueueableAction;
    
    public function execute(User $user, array $profileData): UserProfile
    {
        return UserProfile::create([
            'user_id' => $user->id,
            'bio' => $profileData['bio'],
            'avatar' => $profileData['avatar'],
        ]);
    }
}
```

## Usage Patterns

### In Filament Resources
```php
<?php

declare(strict_types=1);

namespace Modules\User\Filament\Resources\UserResource\Pages;

use Modules\Xot\Filament\Resources\Pages\XotBaseCreateRecord;
use Modules\User\Actions\CreateUserAction;

class CreateUser extends XotBaseCreateRecord
{
    protected static string $resource = UserResource::class;
    
    protected function handleRecordCreation(array $data): Model
    {
        // ✅ Use Action instead of inline logic
        return app(CreateUserAction::class)->execute($data);
    }
}
```

### In Volt Components
```php
<?php
// resources/views/folio/users/create.blade.php

use Livewire\Volt\Component;
use Modules\User\Actions\CreateUserAction;
use Modules\User\Actions\SendWelcomeEmailAction;

new class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    
    public function save(): void
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        
        // ✅ Use Actions for business logic
        $user = app(CreateUserAction::class)->execute([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        
        // ✅ Queue welcome email
        app(SendWelcomeEmailAction::class)
            ->onQueue('emails')
            ->execute($user);
        
        $this->redirect('/users');
    }
}; ?>

<div>
    <form wire:submit="save">
        <flux:input wire:model="name" placeholder="Name" />
        <flux:input wire:model="email" placeholder="Email" type="email" />
        <flux:input wire:model="password" placeholder="Password" type="password" />
        <flux:button type="submit">Create User</flux:button>
    </form>
</div>
```

### In Console Commands
```php
<?php

declare(strict_types=1);

namespace Modules\User\Console\Commands;

use Modules\Xot\Console\Commands\XotBaseCommand;
use Modules\User\Actions\ImportUsersAction;

class ImportUsersCommand extends XotBaseCommand
{
    protected $signature = 'users:import {file}';
    
    public function handle(): void
    {
        $file = $this->argument('file');
        
        // ✅ Use Action for complex logic
        app(ImportUsersAction::class)
            ->onQueue('imports')
            ->execute($file);
            
        $this->info('User import queued successfully');
    }
}
```

## Action Benefits

### 1. Single Responsibility
Each Action has one clear purpose:
```php
// ✅ Clear, focused actions
CreateUserAction::class           // Only creates users
SendWelcomeEmailAction::class     // Only sends welcome emails
ProcessPaymentAction::class       // Only processes payments
```

### 2. Queueable by Default
```php
// ✅ Easy to queue any action
app(SendWelcomeEmailAction::class)
    ->onQueue('emails')
    ->delay(now()->addMinutes(5))
    ->execute($user);
```

### 3. Testable in Isolation
```php
<?php

use Modules\User\Actions\CreateUserAction;
use Modules\User\Models\User;

it('creates a user with valid data', function () {
    $action = new CreateUserAction();
    
    $user = $action->execute([
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password123',
    ]);
    
    expect($user)->toBeInstanceOf(User::class);
    expect($user->name)->toBe('John Doe');
    expect($user->email)->toBe('john@example.com');
});
```

### 4. Reusable Across Context
```php
// ✅ Same action used in different contexts
// In Filament
app(CreateUserAction::class)->execute($data);

// In Volt component  
app(CreateUserAction::class)->execute($data);

// In console command
app(CreateUserAction::class)->execute($data);

// In queue job
app(CreateUserAction::class)->onQueue('users')->execute($data);
```

## Action Types

### 1. CRUD Actions
```php
CreateUserAction::class
UpdateUserAction::class
DeleteUserAction::class
RestoreUserAction::class
```

### 2. Business Logic Actions
```php
ProcessOrderAction::class
CalculateDiscountAction::class
ValidateInventoryAction::class
GenerateInvoiceAction::class
```

### 3. Communication Actions
```php
SendWelcomeEmailAction::class
SendInvoiceAction::class
NotifyAdminAction::class
SendSmsAction::class
```

### 4. Data Processing Actions
```php
ImportUsersAction::class
ExportReportAction::class
SynchronizeDataAction::class
BackupDatabaseAction::class
```

### 5. External Integration Actions
```php
SyncWithStripeAction::class
UpdateCrmContactAction::class
SendToAnalyticsAction::class
```

## Testing Actions

### Unit Testing
```php
<?php

use Modules\User\Actions\CreateUserAction;
use Modules\User\Models\User;

describe('CreateUserAction', function () {
    it('creates user with valid data', function () {
        $action = new CreateUserAction();
        
        $user = $action->execute([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
        ]);
        
        expect($user)->toBeInstanceOf(User::class);
        assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
    });
    
    it('validates required fields', function () {
        $action = new CreateUserAction();
        
        expect(fn() => $action->execute([]))
            ->toThrow(ValidationException::class);
    });
});
```

### Feature Testing with Actions
```php
<?php

use Modules\User\Actions\CreateUserAction;
use Modules\User\Actions\SendWelcomeEmailAction;

it('creates user and sends welcome email', function () {
    Queue::fake();
    
    $userData = [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password123',
    ];
    
    $user = app(CreateUserAction::class)->execute($userData);
    
    app(SendWelcomeEmailAction::class)
        ->onQueue('emails')
        ->execute($user);
    
    Queue::assertPushedOn('emails', SendWelcomeEmailAction::class);
});
```

## Action Creation

### Artisan Command
```bash
# Create new action
php artisan make:action CreateUserAction

# Create queueable action
php artisan make:action ProcessOrderAction --queued
```

### Manual Creation Template
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Actions;

use Spatie\QueueableAction\QueueableAction;

class [ActionName]Action
{
    use QueueableAction;
    
    public function execute(/* parameters */): /* return type */
    {
        // Action logic here
    }
}
```

## Migration from Services

### ❌ Old Service Pattern
```php
class UserService
{
    public function createUser(array $data): User { /* logic */ }
    public function updateUser(User $user, array $data): User { /* logic */ }
    public function deleteUser(User $user): void { /* logic */ }
    public function sendWelcomeEmail(User $user): void { /* logic */ }
}
```

### ✅ New Action Pattern
```php
class CreateUserAction
{
    use QueueableAction;
    public function execute(array $data): User { /* logic */ }
}

class UpdateUserAction  
{
    use QueueableAction;
    public function execute(User $user, array $data): User { /* logic */ }
}

class DeleteUserAction
{
    use QueueableAction;
    public function execute(User $user): void { /* logic */ }
}

class SendWelcomeEmailAction
{
    use QueueableAction;
    public function execute(User $user): void { /* logic */ }
}
```

## Summary

- **No Service Classes** - Use Actions instead
- **Single Responsibility** - One action, one purpose
- **Queueable by Default** - Easy background processing
- **Testable** - Isolated unit testing
- **Reusable** - Same action across different contexts
- **Organized** - Clear directory structure
- **Spatie Package** - Uses `laravel-queueable-action`