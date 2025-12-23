# Testing Guidelines

## Pest Testing Framework

### Test Structure and Organization
```php
<?php

declare(strict_types=1);

use App\Models\User;
use App\Models\Post;
use function Pest\Laravel\{actingAs, assertDatabaseHas, get, post};

// ✅ Descriptive test names
it('can create a new post with valid data', function () {
    $user = User::factory()->create();
    
    actingAs($user)
        ->post('/posts', [
            'title' => 'Test Post',
            'content' => 'This is a test post content.',
            'published' => true,
        ])
        ->assertRedirect('/posts')
        ->assertSessionHas('success');
        
    assertDatabaseHas('posts', [
        'title' => 'Test Post',
        'user_id' => $user->id,
        'published' => true,
    ]);
});

// ✅ Test grouping with describe
describe('Post Management', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    });
    
    it('can list all posts', function () {
        Post::factory()->count(3)->create(['user_id' => $this->user->id]);
        
        get('/posts')
            ->assertOk()
            ->assertViewIs('posts.index')
            ->assertViewHas('posts');
    });
    
    it('can show a specific post', function () {
        $post = Post::factory()->create(['user_id' => $this->user->id]);
        
        get("/posts/{$post->id}")
            ->assertOk()
            ->assertViewIs('posts.show')
            ->assertViewHas('post', $post);
    });
});
```

### Data Providers and Datasets
```php
// ✅ Using datasets for parameterized tests
it('validates post creation data', function (array $data, string $expectedError) {
    $user = User::factory()->create();
    
    actingAs($user)
        ->post('/posts', $data)
        ->assertSessionHasErrors($expectedError);
})->with([
    'empty title' => [['title' => '', 'content' => 'Content'], 'title'],
    'long title' => [['title' => str_repeat('a', 256), 'content' => 'Content'], 'title'],
    'empty content' => [['title' => 'Title', 'content' => ''], 'content'],
    'invalid published' => [['title' => 'Title', 'content' => 'Content', 'published' => 'invalid'], 'published'],
]);

// ✅ Custom datasets
dataset('user_roles', function () {
    return [
        'admin' => [User::factory()->admin()],
        'editor' => [User::factory()->editor()],
        'author' => [User::factory()->author()],
    ];
});

it('can access admin panel', function ($userFactory) {
    $user = $userFactory->create();
    
    actingAs($user)
        ->get('/admin')
        ->assertOk();
})->with('user_roles');
```

### Factory Usage
```php
<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'content' => fake()->paragraphs(3, true),
            'published' => fake()->boolean(70), // 70% chance of being published
            'user_id' => User::factory(),
            'published_at' => fake()->optional(0.7)->dateTimeBetween('-1 year', 'now'),
        ];
    }
    
    // ✅ Factory states for different scenarios
    public function published(): static
    {
        return $this->state(fn() => [
            'published' => true,
            'published_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ]);
    }
    
    public function draft(): static
    {
        return $this->state(fn() => [
            'published' => false,
            'published_at' => null,
        ]);
    }
    
    public function withAuthor(User $author): static
    {
        return $this->state(fn() => ['user_id' => $author->id]);
    }
}

// ✅ Usage in tests
it('shows only published posts to guests', function () {
    Post::factory()->published()->count(3)->create();
    Post::factory()->draft()->count(2)->create();
    
    get('/posts')
        ->assertOk()
        ->assertViewHas('posts', function ($posts) {
            return $posts->count() === 3 && $posts->every->published;
        });
});
```

## Feature Testing

### HTTP Testing Patterns
```php
<?php

declare(strict_types=1);

use App\Models\User;
use function Pest\Laravel\{get, post, put, delete, patch};

// ✅ Comprehensive CRUD testing
describe('User CRUD Operations', function () {
    beforeEach(function () {
        $this->admin = User::factory()->admin()->create();
        $this->actingAs($this->admin);
    });
    
    it('can list users with pagination', function () {
        User::factory()->count(25)->create();
        
        get('/admin/users')
            ->assertOk()
            ->assertViewIs('admin.users.index')
            ->assertViewHas('users')
            ->assertSee('Next'); // Pagination link
    });
    
    it('can search users by name', function () {
        $john = User::factory()->create(['name' => 'John Doe']);
        $jane = User::factory()->create(['name' => 'Jane Smith']);
        
        get('/admin/users?search=John')
            ->assertOk()
            ->assertSee($john->name)
            ->assertDontSee($jane->name);
    });
    
    it('can create a new user', function () {
        $userData = [
            'name' => 'New User',
            'email' => 'newuser@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ];
        
        post('/admin/users', $userData)
            ->assertRedirect('/admin/users')
            ->assertSessionHas('success');
            
        assertDatabaseHas('users', [
            'name' => 'New User',
            'email' => 'newuser@example.com',
        ]);
    });
    
    it('can update user information', function () {
        $user = User::factory()->create();
        
        put("/admin/users/{$user->id}", [
            'name' => 'Updated Name',
            'email' => $user->email,
        ])
        ->assertRedirect("/admin/users/{$user->id}")
        ->assertSessionHas('success');
        
        expect($user->fresh()->name)->toBe('Updated Name');
    });
    
    it('can delete a user', function () {
        $user = User::factory()->create();
        
        delete("/admin/users/{$user->id}")
            ->assertRedirect('/admin/users')
            ->assertSessionHas('success');
            
        assertDatabaseMissing('users', ['id' => $user->id]);
    });
});
```

### Authentication Testing
```php
// ✅ Authentication and authorization tests
describe('Authentication', function () {
    it('redirects guests to login', function () {
        get('/admin/dashboard')
            ->assertRedirect('/login');
    });
    
    it('allows authenticated users to access dashboard', function () {
        $user = User::factory()->create();
        
        actingAs($user)
            ->get('/admin/dashboard')
            ->assertOk();
    });
    
    it('prevents unauthorized access to admin routes', function () {
        $user = User::factory()->create(); // Regular user
        
        actingAs($user)
            ->get('/admin/users')
            ->assertForbidden();
    });
    
    it('logs in with valid credentials', function () {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);
        
        post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ])
        ->assertRedirect('/dashboard')
        ->assertSessionMissing('errors');
        
        expect(auth()->check())->toBeTrue();
        expect(auth()->user()->id)->toBe($user->id);
    });
});
```

## Filament Testing

### Resource Testing
```php
<?php

declare(strict_types=1);

use App\Filament\Resources\PostResource;
use App\Filament\Resources\PostResource\Pages\ListPosts;
use App\Filament\Resources\PostResource\Pages\CreatePost;
use App\Filament\Resources\PostResource\Pages\EditPost;
use App\Models\{User, Post};
use function Pest\Livewire\livewire;

// ✅ Filament resource testing
describe('Post Resource', function () {
    beforeEach(function () {
        $this->admin = User::factory()->admin()->create();
        $this->actingAs($this->admin);
    });
    
    it('can list posts', function () {
        $posts = Post::factory()->count(3)->create();
        
        livewire(ListPosts::class)
            ->assertCanSeeTableRecords($posts)
            ->assertCountTableRecords(3);
    });
    
    it('can search posts by title', function () {
        $targetPost = Post::factory()->create(['title' => 'Target Post']);
        $otherPost = Post::factory()->create(['title' => 'Other Post']);
        
        livewire(ListPosts::class)
            ->searchTable('Target')
            ->assertCanSeeTableRecords([$targetPost])
            ->assertCanNotSeeTableRecords([$otherPost]);
    });
    
    it('can create a post', function () {
        livewire(CreatePost::class)
            ->fillForm([
                'title' => 'New Post',
                'content' => 'This is the content of the new post.',
                'published' => true,
            ])
            ->call('create')
            ->assertHasNoFormErrors()
            ->assertRedirect(PostResource::getUrl('index'));
            
        assertDatabaseHas('posts', [
            'title' => 'New Post',
            'published' => true,
        ]);
    });
    
    it('can edit a post', function () {
        $post = Post::factory()->create();
        
        livewire(EditPost::class, ['record' => $post->getRouteKey()])
            ->fillForm([
                'title' => 'Updated Title',
                'content' => $post->content,
            ])
            ->call('save')
            ->assertHasNoFormErrors();
            
        expect($post->fresh()->title)->toBe('Updated Title');
    });
    
    it('validates required fields', function () {
        livewire(CreatePost::class)
            ->fillForm(['title' => ''])
            ->call('create')
            ->assertHasFormErrors(['title' => 'required']);
    });
});
```

### Widget Testing
```php
// ✅ Filament widget testing
describe('Dashboard Widgets', function () {
    beforeEach(function () {
        $this->admin = User::factory()->admin()->create();
        $this->actingAs($this->admin);
    });
    
    it('displays correct post statistics', function () {
        Post::factory()->published()->count(5)->create();
        Post::factory()->draft()->count(3)->create();
        
        livewire(\App\Filament\Widgets\PostStatsWidget::class)
            ->assertSee('5') // Published posts
            ->assertSee('3') // Draft posts
            ->assertSee('8'); // Total posts
    });
});
```

## Livewire/Volt Testing

### Volt Component Testing
```php
<?php

declare(strict_types=1);

use App\Models\{User, Product};
use Livewire\Volt\Volt;

// ✅ Volt component testing
describe('Product Search Component', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    });
    
    it('displays all products initially', function () {
        $products = Product::factory()->count(3)->create();
        
        Volt::test('pages.products.search')
            ->assertSee($products[0]->name)
            ->assertSee($products[1]->name)
            ->assertSee($products[2]->name);
    });
    
    it('filters products by search term', function () {
        $targetProduct = Product::factory()->create(['name' => 'Target Product']);
        $otherProduct = Product::factory()->create(['name' => 'Other Product']);
        
        Volt::test('pages.products.search')
            ->set('search', 'Target')
            ->assertSee($targetProduct->name)
            ->assertDontSee($otherProduct->name);
    });
    
    it('shows no results message when no products match', function () {
        Product::factory()->create(['name' => 'Product One']);
        
        Volt::test('pages.products.search')
            ->set('search', 'NonExistent')
            ->assertSee('No products found')
            ->assertDontSee('Product One');
    });
    
    it('resets to first page when searching', function () {
        Product::factory()->count(25)->create();
        
        Volt::test('pages.products.search')
            ->set('page', 2)
            ->set('search', 'test')
            ->assertSet('page', 1);
    });
});

// ✅ Interactive behavior testing
it('can add product to cart', function () {
    $product = Product::factory()->create();
    
    Volt::test('pages.products.show', ['product' => $product])
        ->call('addToCart')
        ->assertDispatched('cart-updated')
        ->assertSee('Added to cart');
});

// ✅ Form submission testing
it('can create product with form validation', function () {
    Volt::test('pages.products.create')
        ->set('form.name', 'Test Product')
        ->set('form.price', 99.99)
        ->set('form.description', 'Test description')
        ->call('save')
        ->assertHasNoErrors()
        ->assertRedirect('/products');
        
    assertDatabaseHas('products', ['name' => 'Test Product']);
});
```

### Traditional Livewire Testing
```php
// ✅ Traditional Livewire component testing
use App\Livewire\PostManager;

it('can toggle post visibility', function () {
    $post = Post::factory()->create(['published' => false]);
    
    Livewire::test(PostManager::class, ['post' => $post])
        ->call('toggleVisibility')
        ->assertEmitted('post-updated')
        ->assertSee('Published');
        
    expect($post->fresh()->published)->toBeTrue();
});
```

## Unit Testing

### Service Class Testing
```php
<?php

declare(strict_types=1);

use App\Services\PostService;
use App\Models\{User, Post};

// ✅ Service layer testing
describe('PostService', function () {
    beforeEach(function () {
        $this->service = new PostService();
        $this->user = User::factory()->create();
    });
    
    it('creates a post with valid data', function () {
        $data = [
            'title' => 'Test Post',
            'content' => 'Test content',
            'published' => true,
        ];
        
        $post = $this->service->createPost($this->user, $data);
        
        expect($post)->toBeInstanceOf(Post::class);
        expect($post->title)->toBe('Test Post');
        expect($post->user_id)->toBe($this->user->id);
        expect($post->published)->toBeTrue();
    });
    
    it('generates slug from title', function () {
        $data = [
            'title' => 'This is a Test Post!',
            'content' => 'Test content',
        ];
        
        $post = $this->service->createPost($this->user, $data);
        
        expect($post->slug)->toBe('this-is-a-test-post');
    });
    
    it('throws exception for invalid data', function () {
        $data = ['title' => '']; // Invalid data
        
        expect(fn() => $this->service->createPost($this->user, $data))
            ->toThrow(InvalidArgumentException::class);
    });
});
```

### Model Testing
```php
// ✅ Model behavior testing
describe('Post Model', function () {
    it('has correct relationships', function () {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        
        expect($post->author)->toBeInstanceOf(User::class);
        expect($post->author->id)->toBe($user->id);
    });
    
    it('scopes published posts correctly', function () {
        Post::factory()->published()->count(3)->create();
        Post::factory()->draft()->count(2)->create();
        
        $publishedPosts = Post::published()->get();
        
        expect($publishedPosts)->toHaveCount(3);
        expect($publishedPosts->every->published)->toBeTrue();
    });
    
    it('formats dates correctly', function () {
        $post = Post::factory()->create([
            'published_at' => '2023-01-15 10:30:00'
        ]);
        
        expect($post->published_at->format('Y-m-d'))->toBe('2023-01-15');
    });
    
    it('casts attributes correctly', function () {
        $post = Post::factory()->create(['published' => 1]);
        
        expect($post->published)->toBeTrue();
        expect($post->metadata)->toBeArray();
    });
});
```

## Database Testing

### Migration Testing
```php
// ✅ Migration testing
use Illuminate\Support\Facades\Schema;

it('creates posts table with correct structure', function () {
    expect(Schema::hasTable('posts'))->toBeTrue();
    
    expect(Schema::hasColumns('posts', [
        'id', 'title', 'slug', 'content', 'published',
        'published_at', 'user_id', 'created_at', 'updated_at'
    ]))->toBeTrue();
    
    expect(Schema::hasColumn('posts', 'title'))->toBeTrue();
    expect(Schema::hasColumn('posts', 'content'))->toBeTrue();
});

it('has correct foreign key constraints', function () {
    $user = User::factory()->create();
    $post = Post::factory()->create(['user_id' => $user->id]);
    
    expect($post->user_id)->toBe($user->id);
    
    // Test cascade delete if configured
    $user->delete();
    expect(Post::find($post->id))->toBeNull();
});
```

### Seeder Testing
```php
// ✅ Seeder testing
it('creates correct number of users', function () {
    $this->seed(UserSeeder::class);
    
    expect(User::count())->toBe(10);
    expect(User::where('role', 'admin')->count())->toBe(1);
});
```

## API Testing

### API Endpoint Testing
```php
// ✅ API testing
describe('Posts API', function () {
    beforeEach(function () {
        $this->user = User::factory()->create();
        $this->token = $this->user->createToken('test')->plainTextToken;
    });
    
    it('can list posts via API', function () {
        Post::factory()->count(3)->create();
        
        $this->withHeaders(['Authorization' => "Bearer {$this->token}"])
            ->getJson('/api/posts')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'title', 'content', 'published', 'created_at']
                ]
            ]);
    });
    
    it('can create post via API', function () {
        $postData = [
            'title' => 'API Test Post',
            'content' => 'This is a test post created via API',
            'published' => true,
        ];
        
        $this->withHeaders(['Authorization' => "Bearer {$this->token}"])
            ->postJson('/api/posts', $postData)
            ->assertCreated()
            ->assertJsonFragment(['title' => 'API Test Post']);
            
        assertDatabaseHas('posts', ['title' => 'API Test Post']);
    });
    
    it('validates API input', function () {
        $this->withHeaders(['Authorization' => "Bearer {$this->token}"])
            ->postJson('/api/posts', ['title' => ''])
            ->assertUnprocessable()
            ->assertJsonValidationErrors('title');
    });
    
    it('requires authentication for protected endpoints', function () {
        $this->getJson('/api/posts')
            ->assertUnauthorized();
    });
});
```

## Performance Testing

### Load Testing
```php
// ✅ Performance testing
it('can handle multiple concurrent requests', function () {
    $posts = Post::factory()->count(100)->create();
    
    $startTime = microtime(true);
    
    // Simulate multiple requests
    for ($i = 0; $i < 10; $i++) {
        get('/posts')->assertOk();
    }
    
    $endTime = microtime(true);
    $totalTime = ($endTime - $startTime) * 1000; // Convert to milliseconds
    
    expect($totalTime)->toBeLessThan(5000); // Should complete within 5 seconds
});

it('efficiently loads posts with relationships', function () {
    Post::factory()->count(50)->create();
    
    // Monitor query count
    DB::enableQueryLog();
    
    get('/posts');
    
    $queries = DB::getQueryLog();
    
    // Should not have N+1 query problem
    expect(count($queries))->toBeLessThan(5);
});
```

## Test Organization

### Test Configuration
```php
// tests/Pest.php
<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(
    Tests\TestCase::class,
    RefreshDatabase::class,
)->in('Feature');

uses(Tests\TestCase::class)->in('Unit');

// Custom expectations
expect()->extend('toBeValidEmail', function () {
    return $this->toMatch('/^[^\s@]+@[^\s@]+\.[^\s@]+$/');
});

// Global functions
function createAdminUser(): User
{
    return User::factory()->admin()->create();
}
```

### Test Helpers
```php
// tests/TestCase.php
<?php

declare(strict_types=1);

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    
    protected function setUp(): void
    {
        parent::setUp();
        
        // ✅ Common test setup
        $this->withoutVite();
    }
    
    protected function signIn(?User $user = null): User
    {
        $user = $user ?: User::factory()->create();
        $this->actingAs($user);
        return $user;
    }
    
    protected function signInAdmin(): User
    {
        return $this->signIn(User::factory()->admin()->create());
    }
}
```