---
trigger: model_decision
description: This rule outlines comprehensive best practices for Laravel development, covering coding standards, security, performance, and testing to ensure maintainable, efficient, and secure applications. It provides guidelines for code organization, common patterns, performance considerations, security best practices, testing approaches, common pitfalls, and tooling.
globs: *.php
---
- Adhere to PSR coding standards (PSR-1, PSR-2, PSR-12).
- Use meaningful and descriptive variable, function, and class names in English.
- Organize routes effectively, leveraging resource controllers and route groups.
- Use Eloquent ORM for database interactions; avoid raw SQL queries where possible (unless necessary for performance).
- Implement caching strategies using Laravel's caching system for frequently accessed data.
- Maintain a clear and consistent project structure following Laravel's conventions (app, config, database, public, resources, routes, storage).
- Ensure code simplicity and readability to enhance maintainability. Follow the single responsibility principle.
- Keep Laravel and its packages up-to-date to mitigate security vulnerabilities and leverage new features.

### 1. Code Organization and Structure:

   - **Directory Structure Best Practices:**
     - Follow Laravel's default directory structure: `app` (core application logic), `config` (configuration files), `database` (migrations and seeds), `public` (static assets), `resources` (views and assets), `routes` (route definitions), `storage` (file storage).
     - Organize `app` directory using subdirectories like `Models`, `Controllers`, `Services`, `Repositories`, `Exceptions`, `Policies`, `Providers`, and `Http/Middleware`.
     - Consider using modules for larger applications to encapsulate features.

   - **File Naming Conventions:**
     - Use PascalCase for class names (e.g., `UserController`).
     - Use camelCase for variable and function names (e.g., `$userName`, `getUserName()`).
     - Use snake_case for database table names and column names (e.g., `user_profiles`, `first_name`).
     - All names should be in English, following Laravel conventions.

   - **Naming Standards:**
     - Class names: Singular, PascalCase (e.g., `Post`, `User`, `CommentController`)
     - Model names: Singular, PascalCase (e.g., `User`, `Post`, `Category`)
     - Table names: Plural, snake_case (e.g., `users`, `posts`, `post_categories`)
     - Controllers: Plural, PascalCase with Controller suffix (e.g., `UsersController`)
     - Methods: camelCase, verb prefix for actions (e.g., `getUser()`, `createPost()`)
     - Variables: camelCase, descriptive (e.g., `$userCount`, `$isAdmin`)
     - Constants: All uppercase with underscores (e.g., `USER_STATUS_ACTIVE`)
     - Interfaces: PascalCase with Interface suffix (e.g., `RepositoryInterface`)
     - Traits: PascalCase with Trait suffix (e.g., `HasPermissionsTrait`)

### 2. Common Patterns and Practices:

   - **SOLID Principles:**
     - Single Responsibility: Classes should have only one reason to change.
     - Open/Closed: Entities should be open for extension but closed for modification.
     - Liskov Substitution: Derived classes should be substitutable for their base classes.
     - Interface Segregation: Clients should not be forced to depend on interfaces they don't use.
     - Dependency Inversion: Depend on abstractions, not concretions.

   - **Repository Pattern:**
     - Implement repositories to abstract data access logic.
     - Decouple business logic from database operations.
     - Example: `UserRepository` with methods like `findById()`, `create()`, etc.

   - **Service Layer:**
     - Use services to encapsulate business logic.
     - Coordinate multiple repositories or operations.
     - Example: `PaymentService` handling transaction, user balance update, notification.

   - **Dependency Injection:**
     - Use Laravel's built-in DI container.
     - Constructor injection for required dependencies.
     - Method injection for optional dependencies.
     - Register bindings in service providers.

### 3. Performance Considerations:

   - **Database Optimization:**
     - Use eager loading to prevent N+1 query problems: `$users = User::with('posts')->get()`.
     - Add proper indexes to frequently queried columns.
     - Consider chunking for processing large result sets: `User::chunk(100, function ($users) { ... })`.
     - Use query caching for expensive queries.

   - **Caching Strategies:**
     - Cache results of expensive operations.
     - Use Laravel's built-in cache drivers.
     - Consider cache tags for related items.
     - Remember to clear cache when data changes.

   - **Queue Jobs for Intensive Tasks:**
     - Offload time-consuming tasks to queues.
     - Use Laravel's queue system with different drivers.
     - Implement rate limiting for API-dependent jobs.
     - Set appropriate timeouts and retry logic.

### 4. Security Best Practices:

   - **Input Validation:**
     - Always validate input data using Form Requests or validator.
     - Use Laravel's validation rules extensively.
     - Create custom validation rules when needed.
     - Consider server-side validation even for client-validated data.

   - **SQL Injection Prevention:**
     - Always use Eloquent or Query Builder parameterized queries.
     - Never directly interpolate user input into SQL strings.
     - Be cautious with raw queries and DB::raw().

   - **XSS Prevention:**
     - Use `{{ }}` (escaped) over `{!! !!}` (unescaped) in Blade templates.
     - Sanitize user input before storage when required.
     - Consider Content Security Policy headers.

   - **CSRF Protection:**
     - Include CSRF token in all forms: `@csrf` directive.
     - Use Laravel's built-in CSRF protection middleware.
     - Configure exceptions when necessary (e.g., for specific API endpoints).

   - **Authentication & Authorization:**
     - Use Laravel's built-in authentication system.
     - Implement proper authorization using Gates and Policies.
     - Consider two-factor authentication for sensitive applications.
     - Implement proper password policies.

### 5. Testing Approaches:

   - **Unit Testing:**
     - Test individual components in isolation.
     - Use PHPUnit for testing.
     - Mock dependencies using Mockery or PHPUnit's built-in mocking.
     - Aim for high test coverage of business logic.

   - **Feature Testing:**
     - Test complete features or user flows.
     - Use Laravel's testing helpers for HTTP requests, database, and authentication.
     - Test both happy paths and edge cases.

   - **Database Testing:**
     - Use database transactions to roll back changes after tests.
     - Consider using an in-memory SQLite database for faster tests.
     - Create factories for test data generation.

   - **CI/CD Integration:**
     - Run tests automatically on push/pull requests.
     - Include static analysis tools in CI pipeline.
     - Consider automated deployment after tests pass.

### 6. Common Pitfalls and Anti-patterns:

   - **Memory Leaks:**
     - Be cautious with event listeners that capture variables by reference.
     - Clean up resources properly in long-running processes.

   - **N+1 Query Problem:**
     - Always use eager loading for related models when displaying lists.
     - Monitor database queries during development.

   - **Fat Controllers:**
     - Move business logic to services or repositories.
     - Keep controllers focused on HTTP concerns.

   - **Model Logic Overload:**
     - Avoid putting too much logic in models.
     - Consider using traits, observers, or services for complex logic.

   - **Non-atomic Transactions:**
     - Use database transactions for operations that should succeed or fail together.
     - Handle exceptions properly within transactions.

### 7. Tooling and Ecosystem:

   - **Recommended Development Tools:**
     - PHPStorm or VSCode with PHP extensions.
     - Laravel Telescope for debugging.
     - Laravel Debugbar for performance monitoring.
     - PHP CS Fixer for code style enforcement.

   - **Package Recommendations:**
     - Laravel Horizon for queue monitoring.
     - Spatie packages for common functionality.
     - Laravel Mix or Vite for asset compilation.
     - Laravel Sanctum or Passport for API authentication.

   - **Deployment Considerations:**
     - Use deployment tools like Deployer or Laravel Forge.
     - Implement zero-downtime deployments.
     - Set up proper logging and monitoring.
     - Consider containerization with Docker.

  Laravel
  - Always use English for class names, attributes, methods, and variables.
  - Apply try-catch blocks for predictable errors.
  - Use Laravel's request validation and middleware effectively.
  - Implement Eloquent ORM for database modeling and queries.
  - Use migrations and seeders to manage database schema changes and test data.

  Vue.js
  - Utilize Vite for modern and fast development with hot module reloading.
  - Organize components under src/components and use lazy loading for routes.
  - Apply Vue Router for SPA navigation and dynamic routing.
  - Implement Pinia for state management in a modular way.
  - Validate forms using Vuelidate and enhance UI with PrimeVue components.
  
  Dependencies
  - Laravel (latest stable version)
  - Composer for dependency management
  - TailwindCSS for styling and responsive design
  - Vite for asset bundling and Vue integration

  Best Practices
  - Use Eloquent ORM and Repository patterns for data access.
  - Secure APIs with Laravel Passport and ensure proper CSRF protection.
  - Leverage Laravel's caching mechanisms for optimal performance.
  - Use Laravel's testing tools (PHPUnit, Dusk) for unit and feature testing.
  - Apply API versioning for maintaining backward compatibility.
  - Ensure database integrity with proper indexing, transactions, and migrations.
  - Use Laravel's localization features for multi-language support.
  - Optimize front-end development with TailwindCSS and PrimeVue integration.

  Key Conventions
  1. Follow Laravel's MVC architecture.
  2. Use routing for clean URL and endpoint definitions.
  3. Implement request validation with Form Requests.
  4. Build reusable Vue components and modular state management.
  5. Use Laravel's Blade engine or API resources for efficient views.
  6. Manage database relationships using Eloquent's features.
  7. Ensure code decoupling with Laravel's events and listeners.
  8. Implement job queues and background tasks for better scalability.
  9. Use Laravel's built-in scheduling for recurring processes.
  10. Employ Laravel Mix or Vite for asset optimization and bundling.
  11. Always use English for naming conventions following Laravel standards.