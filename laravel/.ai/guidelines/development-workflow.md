# Development Workflow

## File Creation Workflow

### Laravel Artisan Commands
Always use Laravel's built-in commands for file creation:

```bash
# Models
php artisan make:model User --factory --migration --seed

# Controllers
php artisan make:controller UserController --resource

# Form Requests
php artisan make:request StoreUserRequest

# Services and other classes
php artisan make:class Services/UserService

# Tests
php artisan make:test UserTest --pest
php artisan make:test UserTest --pest --unit
```

### Filament Commands
```bash
# Resources
php artisan make:filament-resource User --generate --view

# Pages
php artisan make:filament-page Settings --type=custom

# Widgets
php artisan make:filament-widget UserStatsWidget --stats-overview

# Always use --no-interaction flag in automated scripts
php artisan make:filament-resource User --generate --no-interaction
```

### Livewire/Volt Commands
```bash
# Volt components
php artisan make:volt counter --test --pest
php artisan make:volt users/create --test --pest

# Traditional Livewire components
php artisan make:livewire Users\\CreateUser
```

### Folio Pages
```bash
# Create new pages
php artisan folio:page products
php artisan folio:page products/[id]
php artisan folio:page admin/dashboard

# Note: Folio pages should be placed in Modules/[Module]/resources/views/folio/

# List existing routes
php artisan folio:list
```

## Code Quality Workflow

### Before Committing
1. **Format Code**: `vendor/bin/pint --dirty`
2. **Static Analysis**: `vendor/bin/phpstan analyse`
3. **Run Tests**: `php artisan test --filter=relevant_tests`

### Pre-commit Commands
```bash
# Format only changed files
vendor/bin/pint --dirty

# Run PHPStan on specific paths
vendor/bin/phpstan analyse app/ --level=9

# Run specific test suites
php artisan test tests/Feature/UserTest.php
php artisan test --filter=user_management
```

## Module Development

### Creating New Modules
```bash
# Generate module structure
php artisan module:make ModuleName

# Generate within module
php artisan module:make-model User ModuleName
php artisan module:make-controller UserController ModuleName
php artisan module:make-migration create_users_table ModuleName
```

### Module-Specific Workflows
Each module should have:
- Independent testing: `php artisan test Modules/ModuleName/tests/`
- Module documentation in `Modules/ModuleName/docs/`
- Module-specific build tools
- Independent version control (subtree)
- Module-specific Folio pages in `Modules/ModuleName/resources/views/folio/`

## Testing Workflow

### Test-Driven Development
1. **Write failing test**
2. **Implement minimal code to pass**
3. **Refactor while keeping tests green**
4. **Run full test suite**

### Test Categories
```bash
# Unit tests
php artisan test --testsuite=Unit

# Feature tests
php artisan test --testsuite=Feature

# Module-specific tests
php artisan test Modules/User/tests/

# Filament tests
php artisan test --filter=filament

# Performance tests
php artisan test --group=performance
```

### Testing Best Practices
- Use factories for test data
- Test happy path, edge cases, and failure scenarios
- Mock external services
- Use database transactions for test isolation

## Frontend Development

### Asset Compilation
```bash
# Development
npm run dev

# Production build
npm run build

# Module-specific builds
cd Modules/ModuleName && npm run dev
```

### Livewire Development
```bash
# Start development server
php artisan serve

# Watch for Livewire changes
npm run dev

# Test Livewire components
php artisan test --filter=livewire
```

## Database Workflow

### Migration Management
```bash
# Create migrations
php artisan make:migration create_users_table
php artisan make:migration add_column_to_users_table --table=users

# Run migrations
php artisan migrate
php artisan migrate --path=Modules/User/database/migrations

# Rollback
php artisan migrate:rollback
php artisan migrate:reset
```

### Seeding
```bash
# Create seeders
php artisan make:seeder UserSeeder

# Run seeders
php artisan db:seed
php artisan db:seed --class=UserSeeder
```

## Deployment Workflow

### Pre-deployment Checklist
- [ ] All tests passing
- [ ] Code formatted with Pint
- [ ] PHPStan analysis clean
- [ ] Documentation updated
- [ ] Environment variables configured
- [ ] Database migrations reviewed

### Deployment Commands
```bash
# Install dependencies
composer install --optimize-autoloader --no-dev

# Cache configuration
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations
php artisan migrate --force

# Build assets
npm ci
npm run build

# Clear application cache
php artisan cache:clear
php artisan queue:restart
```

## Git Workflow

### Branch Naming
- `feature/user-management`
- `fix/login-validation`
- `refactor/user-service`
- `docs/api-documentation`

### Commit Messages
```
feat(user): add user profile management
fix(auth): resolve login validation issue
refactor(service): extract user service logic
docs(api): update user endpoint documentation
test(user): add comprehensive user tests
style(format): apply Pint formatting
```

### Module Subtree Management
```bash
# Add module as subtree
git subtree add --prefix=Modules/User git@github.com:org/user-module.git main

# Push changes to module
git subtree push --prefix=Modules/User git@github.com:org/user-module.git main

# Pull module updates
git subtree pull --prefix=Modules/User git@github.com:org/user-module.git main
```

## Performance Optimization

### Database Optimization
- Use eager loading to prevent N+1 queries
- Add database indexes for frequently queried columns
- Use database query optimization tools

### Code Optimization
```bash
# Generate IDE helper files
php artisan ide-helper:generate
php artisan ide-helper:models

# Optimize autoloader
composer dump-autoload --optimize

# Cache optimization
php artisan optimize
```

### Monitoring
- Use Laravel Telescope for development debugging
- Monitor query performance
- Profile memory usage
- Track response times

## Documentation Workflow

### Code Documentation
- Use PHPDoc blocks for all public methods
- Document complex business logic
- Maintain API documentation
- Update README files

### Module Documentation
Each module should maintain:
- `README.md` with installation and usage
- `docs/` directory with detailed documentation
- Architecture decision records
- API documentation
- Translation documentation (IT/EN)