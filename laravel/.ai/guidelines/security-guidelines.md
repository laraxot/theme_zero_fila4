# Security Guidelines

## Authentication & Authorization

### Authentication Patterns
```php
// Use Laravel's built-in authentication
use Modules\Xot\Models\XotBaseUser;
use Laravel\Sanctum\HasApiTokens;

class User extends XotBaseUser
{
    use HasApiTokens;
    
    protected $fillable = [
        'name', 'email', 'password',
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
```

### Authorization with Policies
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Models\Policies;

use Modules\Xot\Contracts\UserContract;
use Modules\[Module]\Models\Post;

class PostPolicy extends \Modules\Xot\Models\Policies\XotBasePolicy
{
    public function view(UserContract $user, Post $post): bool
    {
        return $post->is_published || $user->id === $post->author_id;
    }
    
    public function create(UserContract $user): bool
    {
        return $user->hasRole('author');
    }
    
    public function update(UserContract $user, Post $post): bool
    {
        return $user->id === $post->author_id || $user->hasRole('admin');
    }
}
```

### Filament Access Control
```php
<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use Modules\Xot\Filament\Resources\XotBaseResource;

class UserResource extends XotBaseResource
{
    public static function canViewAny(): bool
    {
        return auth()->user()?->hasRole('admin');
    }
    
    public static function canCreate(): bool
    {
        return auth()->user()?->can('create users');
    }
    
    public static function canEdit(Model $record): bool
    {
        return auth()->user()?->can('update', $record);
    }
}
```

## Input Validation & Sanitization

### Form Request Validation
```php
<?php

declare(strict_types=1);

namespace Modules\[Module]\Http\Requests;

use Modules\Xot\Http\Requests\XotBaseFormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends XotBaseFormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create users');
    }
    
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::defaults()],
            'avatar' => ['nullable', 'image', 'max:2048'],
        ];
    }
    
    public function messages(): array
    {
        return [
            'email.unique' => 'This email address is already registered.',
        ];
    }
}
```

### Livewire Validation
```php
<?php

use Livewire\Volt\Component;
use Illuminate\Validation\Rules\Password;

new class extends Component {
    public string $name = '';
    public string $email = '';
    public string $password = '';
    
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', Password::defaults()],
        ];
    }
    
    public function save(): void
    {
        $this->validate();
        
        // Process validated data
        User::create($this->only(['name', 'email', 'password']));
    }
}; ?>
```

## Data Protection

### Mass Assignment Protection
```php
<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    
    protected $guarded = [
        'is_admin',
        'role',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
        'api_token',
    ];
}
```

### Encryption for Sensitive Data
```php
<?php

declare(strict_types=1);

namespace App\Models;

use Modules\Xot\Models\XotBaseModel;
use Illuminate\Database\Eloquent\Casts\Attribute;

class UserProfile extends XotBaseModel
{
    protected function socialSecurityNumber(): Attribute
    {
        return Attribute::make(
            get: fn(?string $value) => $value ? decrypt($value) : null,
            set: fn(?string $value) => $value ? encrypt($value) : null,
        );
    }
    
    protected function casts(): array
    {
        return [
            'personal_data' => 'encrypted:array',
        ];
    }
}
```

## SQL Injection Prevention

### Always Use Query Builder or Eloquent
```php
// ✅ Safe - Using Query Builder
$users = DB::table('users')
    ->where('email', $email)
    ->where('active', true)
    ->get();

// ✅ Safe - Using Eloquent
$users = User::where('email', $email)
    ->active()
    ->get();

// ✅ Safe - Raw queries with bindings
$users = DB::select('SELECT * FROM users WHERE email = ? AND active = ?', 
    [$email, true]
);

// ❌ Dangerous - Never do this
$users = DB::select("SELECT * FROM users WHERE email = '{$email}'");
```

### Parameterized Queries
```php
// ✅ Safe parameterized query
public function getUsersByRole(string $role): Collection
{
    return DB::table('users')
        ->join('roles', 'users.role_id', '=', 'roles.id')
        ->where('roles.name', $role)
        ->select('users.*')
        ->get();
}

// ✅ Safe raw query with bindings
public function getComplexData(array $params): Collection
{
    return DB::select('
        SELECT u.*, p.name as profile_name 
        FROM users u 
        LEFT JOIN profiles p ON u.id = p.user_id 
        WHERE u.created_at BETWEEN ? AND ? 
        AND u.status = ?
    ', [$params['start_date'], $params['end_date'], $params['status']]);
}
```

## XSS Prevention

### Blade Template Escaping
```blade
{{-- ✅ Safe - Auto-escaped --}}
<p>Welcome {{ $user->name }}</p>

{{-- ✅ Safe - HTML content through Purifier --}}
<div>{!! Purifier::clean($content) !!}</div>

{{-- ❌ Dangerous - Unescaped output --}}
<p>Welcome {!! $user->name !!}</p>

{{-- ✅ Safe - Attribute escaping --}}
<input value="{{ old('name', $user->name) }}" />

{{-- ✅ Safe - URL escaping --}}
<a href="{{ url('/user/' . $user->id) }}">Profile</a>
```

### Content Sanitization
```php
use HTMLPurifier;
use HTMLPurifier_Config;

public function sanitizeContent(string $content): string
{
    $config = HTMLPurifier_Config::createDefault();
    $config->set('HTML.Allowed', 'p,b,strong,i,em,u,a[href],ul,ol,li');
    $purifier = new HTMLPurifier($config);
    
    return $purifier->purify($content);
}
```

## CSRF Protection

### Form Protection
```blade
{{-- ✅ CSRF protection automatically included --}}
<form method="POST" action="{{ route('users.store') }}">
    @csrf
    <input type="text" name="name" value="{{ old('name') }}" />
    <button type="submit">Create User</button>
</form>

{{-- ✅ Method spoofing for PUT/DELETE --}}
<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')
    <!-- form fields -->
</form>
```

### AJAX Requests
```javascript
// ✅ Include CSRF token in AJAX requests
axios.defaults.headers.common['X-CSRF-TOKEN'] = 
    document.querySelector('meta[name="csrf-token"]').getAttribute('content');

// ✅ Or in specific requests
axios.post('/api/users', data, {
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
    }
});
```

## File Upload Security

### Secure File Uploads
```php
<?php

declare(strict_types=1);

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SecureFileUpload implements Rule
{
    private array $allowedMimes = [
        'image/jpeg',
        'image/png', 
        'image/gif',
        'application/pdf',
    ];
    
    private int $maxSize = 2048; // KB
    
    public function passes($attribute, $value): bool
    {
        if (!$value instanceof \Illuminate\Http\UploadedFile) {
            return false;
        }
        
        // Check file size
        if ($value->getSize() > $this->maxSize * 1024) {
            return false;
        }
        
        // Check MIME type
        if (!in_array($value->getMimeType(), $this->allowedMimes)) {
            return false;
        }
        
        // Additional security checks
        return $this->validateFileContent($value);
    }
    
    private function validateFileContent($file): bool
    {
        // Check for malicious content
        $content = file_get_contents($file->getRealPath());
        
        // Look for script tags or PHP code
        if (preg_match('/<script|<\?php|\?>/', $content)) {
            return false;
        }
        
        return true;
    }
}
```

### File Storage Security
```php
// ✅ Store in non-public directory
Storage::disk('local')->put('documents/' . $filename, $content);

// ✅ Generate secure filenames
$filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

// ✅ Validate file types
$request->validate([
    'avatar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    'document' => 'required|file|mimes:pdf,doc,docx|max:10240',
]);
```

## Environment Security

### Configuration Security
```php
// ✅ Always use config() instead of env()
$apiKey = config('services.payment.api_key');

// ❌ Never use env() outside config files
$apiKey = env('PAYMENT_API_KEY'); // Don't do this in controllers/models
```

### Sensitive Data in .env
```bash
# ✅ Use strong, unique values
APP_KEY=base64:generated-key-here
DB_PASSWORD=strong-random-password

# ✅ Different keys per environment
ENCRYPTION_KEY=production-specific-key

# ✅ Secure API keys
STRIPE_SECRET=sk_live_secure_key_here

# ❌ Never commit .env files to version control
# Add .env to .gitignore
```

## API Security

### Rate Limiting
```php
// ✅ Apply rate limiting to API routes
Route::middleware(['throttle:api'])->group(function () {
    Route::apiResource('users', UserController::class);
});

// ✅ Custom rate limits for sensitive endpoints
Route::middleware(['throttle:login'])->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});
```

### API Authentication
```php
// ✅ Use Sanctum for API authentication
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

// ✅ Validate API tokens
public function validateApiAccess(Request $request): bool
{
    return $request->user()->tokenCan('api:access');
}
```

## Security Headers

### HTTP Security Headers
```php
// In a middleware or service provider
public function handle($request, Closure $next)
{
    $response = $next($request);
    
    $response->headers->set('X-Content-Type-Options', 'nosniff');
    $response->headers->set('X-Frame-Options', 'DENY');
    $response->headers->set('X-XSS-Protection', '1; mode=block');
    $response->headers->set('Strict-Transport-Security', 'max-age=31536000; includeSubDomains');
    
    return $response;
}
```

## Logging & Monitoring

### Security Event Logging
```php
use Illuminate\Support\Facades\Log;

// ✅ Log security events
public function login(Request $request): RedirectResponse
{
    if (Auth::attempt($request->only('email', 'password'))) {
        Log::info('User login successful', [
            'user_id' => Auth::id(),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);
        
        return redirect()->intended();
    }
    
    Log::warning('Failed login attempt', [
        'email' => $request->email,
        'ip' => $request->ip(),
        'user_agent' => $request->userAgent(),
    ]);
    
    return back()->withErrors(['email' => 'Invalid credentials']);
}
```

## GDPR Compliance

### Data Privacy
```php
<?php

declare(strict_types=1);

namespace App\Models;

use Modules\[Module]\Models\BaseModel;

class User extends BaseModel
{
    public function anonymize(): void
    {
        $this->update([
            'name' => 'Anonymous User',
            'email' => 'deleted-' . $this->id . '@example.com',
            'phone' => null,
            'address' => null,
        ]);
    }
    
    public function exportPersonalData(): array
    {
        return [
            'personal_information' => $this->only(['name', 'email', 'phone']),
            'profile_data' => $this->profile?->toArray(),
            'activity_log' => $this->activities->toArray(),
        ];
    }
}