# Performance Optimization

## Database Query Optimization

### Eager Loading to Prevent N+1 Queries
```php
// ❌ N+1 Query Problem
$users = User::all();
foreach ($users as $user) {
    echo $user->profile->bio; // Executes a query for each user
}

// ✅ Eager Loading Solution
$users = User::with('profile')->get();
foreach ($users as $user) {
    echo $user->profile->bio; // No additional queries
}

// ✅ Advanced Eager Loading
$users = User::with([
    'profile:id,user_id,bio,avatar',
    'posts' => function ($query) {
        $query->where('published', true)
              ->orderBy('created_at', 'desc')
              ->limit(5);
    }
])->get();

// ✅ Conditional Eager Loading
$users = User::when($includeProfile, function ($query) {
    return $query->with('profile');
})->get();
```

### Query Optimization Techniques
```php
// ✅ Use select() to limit columns
$users = User::select('id', 'name', 'email')->get();

// ✅ Use exists() instead of count() for existence checks
if (User::where('email', $email)->exists()) {
    // User exists
}

// ✅ Use chunk() for large datasets
User::chunk(1000, function ($users) {
    foreach ($users as $user) {
        // Process user
    }
});

// ✅ Use lazy() for memory-efficient iteration
User::lazy()->each(function ($user) {
    // Process user with minimal memory usage
});

// ✅ Use cursor() for very large datasets
foreach (User::cursor() as $user) {
    // Streams results instead of loading all into memory
}
```

### Database Indexing
```php
// Migration with proper indexes
Schema::create('posts', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('content');
    $table->foreignId('user_id')->constrained();
    $table->boolean('published')->default(false);
    $table->timestamp('published_at')->nullable();
    $table->timestamps();
    
    // ✅ Add indexes for frequently queried columns
    $table->index(['published', 'published_at']);
    $table->index(['user_id', 'published']);
    $table->index('title'); // For search functionality
});

// ✅ Composite index for complex queries
Schema::table('posts', function (Blueprint $table) {
    $table->index(['user_id', 'published', 'created_at']);
});
```

### Query Scopes for Reusability
```php
<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function scopePublished(Builder $query): void
    {
        $query->where('published', true)
              ->whereNotNull('published_at')
              ->where('published_at', '<=', now());
    }
    
    public function scopeForUser(Builder $query, User $user): void
    {
        $query->where('user_id', $user->id);
    }
    
    public function scopeRecent(Builder $query, int $days = 30): void
    {
        $query->where('created_at', '>=', now()->subDays($days));
    }
    
    public function scopeWithMinimalData(Builder $query): void
    {
        $query->select('id', 'title', 'slug', 'created_at')
              ->with('author:id,name');
    }
}

// Usage
$posts = Post::published()
             ->recent(7)
             ->withMinimalData()
             ->paginate(10);
```

## Caching Strategies

### Model Caching
```php
<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserService
{
    public function getCachedUser(int $userId): ?User
    {
        return Cache::remember(
            "user.{$userId}",
            now()->addHours(1),
            fn() => User::with('profile')->find($userId)
        );
    }
    
    public function getCachedUserStats(int $userId): array
    {
        return Cache::remember(
            "user.{$userId}.stats",
            now()->addMinutes(30),
            function () use ($userId) {
                return [
                    'posts_count' => Post::where('user_id', $userId)->count(),
                    'comments_count' => Comment::where('user_id', $userId)->count(),
                    'last_active' => User::find($userId)?->last_active_at,
                ];
            }
        );
    }
    
    public function invalidateUserCache(int $userId): void
    {
        Cache::forget("user.{$userId}");
        Cache::forget("user.{$userId}.stats");
    }
}
```

### Query Result Caching
```php
// ✅ Cache expensive queries
public function getPopularPosts(): Collection
{
    return Cache::remember('posts.popular', now()->addHour(), function () {
        return Post::published()
                   ->withCount(['likes', 'comments'])
                   ->having('likes_count', '>', 100)
                   ->orderByDesc('likes_count')
                   ->limit(10)
                   ->get();
    });
}

// ✅ Cache with tags for selective invalidation
public function getCategoryPosts(int $categoryId): Collection
{
    return Cache::tags(['posts', "category.{$categoryId}"])
                ->remember(
                    "category.{$categoryId}.posts",
                    now()->addMinutes(30),
                    fn() => Post::where('category_id', $categoryId)
                                ->published()
                                ->get()
                );
}

// ✅ Invalidate tagged cache
public function invalidateCategoryCache(int $categoryId): void
{
    Cache::tags("category.{$categoryId}")->flush();
}
```

### View and Route Caching
```bash
# ✅ Production optimizations
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# ✅ Clear caches when needed
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

## Livewire Performance

### Efficient Livewire Components
```php
<?php

use Livewire\Volt\Component;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;
    
    public string $search = '';
    public string $filter = 'all';
    
    // ✅ Use computed properties for expensive operations
    public function with(): array
    {
        return [
            'posts' => $this->posts,
            'categories' => $this->categories,
        ];
    }
    
    // ✅ Cache computed properties
    public function getPostsProperty()
    {
        return Cache::remember(
            "posts.{$this->search}.{$this->filter}.page.{$this->page}",
            now()->addMinutes(5),
            function () {
                return Post::query()
                    ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
                    ->when($this->filter !== 'all', fn($q) => $q->where('status', $this->filter))
                    ->latest()
                    ->paginate(10);
            }
        );
    }
    
    // ✅ Use lazy loading for heavy data
    public function getCategoriesProperty()
    {
        return Cache::remember('categories.all', now()->addHour(), function () {
            return Category::withCount('posts')->get();
        });
    }
    
    // ✅ Debounce search updates
    public function updatedSearch(): void
    {
        $this->resetPage();
        $this->dispatch('search-updated', search: $this->search);
    }
}; ?>

<div>
    {{-- ✅ Use wire:key for list items --}}
    @foreach($posts as $post)
        <div wire:key="post-{{ $post->id }}">
            {{ $post->title }}
        </div>
    @endforeach
    
    {{-- ✅ Loading states for better UX --}}
    <div wire:loading.delay class="opacity-50">
        Loading...
    </div>
</div>
```

### Optimizing Wire Updates
```blade
{{-- ✅ Use debouncing for search inputs --}}
<input wire:model.live.debounce.300ms="search" />

{{-- ✅ Use lazy updates for non-critical data --}}
<textarea wire:model.lazy="content"></textarea>

{{-- ✅ Target specific elements for loading states --}}
<button wire:click="save" wire:loading.attr="disabled" wire:target="save">
    <span wire:loading.remove wire:target="save">Save</span>
    <span wire:loading wire:target="save">Saving...</span>
</button>

{{-- ✅ Use wire:key for dynamic lists --}}
@foreach($items as $item)
    <div wire:key="item-{{ $item->id }}">
        <!-- content -->
    </div>
@endforeach
```

## Asset Optimization

### Vite Configuration
```javascript
// vite.config.js
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        // ✅ Optimize for production
        rollupOptions: {
            output: {
                manualChunks: {
                    vendor: ['alpinejs', 'axios'],
                    utils: ['lodash'],
                }
            }
        },
        // ✅ Enable compression
        minify: 'terser',
        terserOptions: {
            compress: {
                drop_console: true,
                drop_debugger: true,
            }
        }
    }
});
```

### Image Optimization
```php
<?php

declare(strict_types=1);

namespace App\Services;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ImageOptimizationService
{
    private ImageManager $manager;
    
    public function __construct()
    {
        $this->manager = new ImageManager(new Driver());
    }
    
    public function optimizeAndResize(string $path, array $sizes = [800, 400, 200]): array
    {
        $optimizedPaths = [];
        $image = $this->manager->read($path);
        
        foreach ($sizes as $size) {
            $resized = $image->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            
            $optimizedPath = $this->generateOptimizedPath($path, $size);
            $resized->save($optimizedPath, quality: 85);
            $optimizedPaths[$size] = $optimizedPath;
        }
        
        return $optimizedPaths;
    }
    
    private function generateOptimizedPath(string $originalPath, int $size): string
    {
        $pathInfo = pathinfo($originalPath);
        return $pathInfo['dirname'] . '/' . 
               $pathInfo['filename'] . "_{$size}." . 
               $pathInfo['extension'];
    }
}
```

## Memory Management

### Memory-Efficient Data Processing
```php
<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\LazyCollection;

class DataProcessingService
{
    public function processLargeDataset(): void
    {
        // ✅ Use lazy collections for memory efficiency
        LazyCollection::make(function () {
            foreach (range(1, 1000000) as $number) {
                yield $number;
            }
        })
        ->filter(fn($number) => $number % 2 === 0)
        ->map(fn($number) => $number * 2)
        ->chunk(1000)
        ->each(function ($chunk) {
            // Process chunk of 1000 items
            $this->processBatch($chunk->toArray());
        });
    }
    
    public function exportLargeDataset(): void
    {
        // ✅ Stream large exports to avoid memory issues
        $callback = function () {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['ID', 'Name', 'Email', 'Created']);
            
            User::chunk(1000, function ($users) use ($handle) {
                foreach ($users as $user) {
                    fputcsv($handle, [
                        $user->id,
                        $user->name,
                        $user->email,
                        $user->created_at->format('Y-m-d'),
                    ]);
                }
            });
            
            fclose($handle);
        };
        
        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="users.csv"',
        ]);
    }
}
```

## Queue Optimization

### Efficient Job Processing
```php
<?php

declare(strict_types=1);

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessUserDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public int $timeout = 300;
    public int $tries = 3;
    public int $backoff = 60;
    
    public function __construct(
        private readonly int $userId
    ) {}
    
    public function handle(): void
    {
        // ✅ Load model inside job to avoid serialization issues
        $user = User::find($this->userId);
        
        if (!$user) {
            $this->fail('User not found');
            return;
        }
        
        // Process user data
        $this->processUserData($user);
    }
    
    public function failed(\Throwable $exception): void
    {
        // ✅ Handle job failures gracefully
        Log::error('User data processing failed', [
            'user_id' => $this->userId,
            'error' => $exception->getMessage(),
        ]);
    }
}

// ✅ Batch processing for efficiency
ProcessUserDataJob::dispatch($userId)
    ->onQueue('high-priority')
    ->delay(now()->addMinutes(5));
```

## Monitoring and Profiling

### Performance Monitoring
```php
<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PerformanceMonitoring
{
    public function handle(Request $request, Closure $next)
    {
        $startTime = microtime(true);
        $startMemory = memory_get_usage(true);
        
        $response = $next($request);
        
        $endTime = microtime(true);
        $endMemory = memory_get_usage(true);
        
        $executionTime = ($endTime - $startTime) * 1000; // Convert to milliseconds
        $memoryUsage = $endMemory - $startMemory;
        
        // ✅ Log slow requests
        if ($executionTime > 1000) { // More than 1 second
            Log::warning('Slow request detected', [
                'url' => $request->fullUrl(),
                'method' => $request->method(),
                'execution_time' => $executionTime,
                'memory_usage' => $memoryUsage,
                'user_id' => auth()->id(),
            ]);
        }
        
        // ✅ Add performance headers for debugging
        if (app()->environment('local')) {
            $response->headers->set('X-Execution-Time', $executionTime);
            $response->headers->set('X-Memory-Usage', $memoryUsage);
        }
        
        return $response;
    }
}
```

### Database Query Monitoring
```php
// In AppServiceProvider::boot()
public function boot(): void
{
    if (app()->environment('local')) {
        DB::listen(function ($query) {
            // ✅ Log slow queries in development
            if ($query->time > 100) { // More than 100ms
                Log::debug('Slow query detected', [
                    'sql' => $query->sql,
                    'bindings' => $query->bindings,
                    'time' => $query->time,
                ]);
            }
        });
    }
}
```

## Production Optimizations

### Deployment Optimizations
```bash
#!/bin/bash
# deployment-optimize.sh

# ✅ Composer optimizations
composer install --optimize-autoloader --no-dev --no-interaction

# ✅ Laravel optimizations
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# ✅ Clear unnecessary caches
php artisan cache:clear

# ✅ Optimize Opcache
php artisan opcache:clear

# ✅ Asset optimizations
npm ci --production
npm run build

# ✅ File permissions
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### Server Configuration
```nginx
# nginx.conf optimizations
server {
    # ✅ Enable gzip compression
    gzip on;
    gzip_vary on;
    gzip_min_length 1024;
    gzip_types text/plain text/css text/xml text/javascript 
               application/javascript application/xml+rss 
               application/json;
    
    # ✅ Browser caching for static assets
    location ~* \.(jpg|jpeg|png|gif|ico|css|js)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
    
    # ✅ Security headers
    add_header X-Frame-Options "SAMEORIGIN" always;
    add_header X-Content-Type-Options "nosniff" always;
    add_header X-XSS-Protection "1; mode=block" always;
    
    # ✅ PHP-FPM optimizations
    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
        
        fastcgi_buffer_size 128k;
        fastcgi_buffers 4 256k;
        fastcgi_busy_buffers_size 256k;
    }
}
```