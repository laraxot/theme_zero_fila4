# Clean Code Comments Rules

## Principles

1. **Comments should explain WHY, not WHAT**
   - ❌ BAD: `// This is a cat` (obvious from context)
   - ✅ GOOD: `// Using cache to avoid expensive database queries on every request`

2. **Avoid obvious comments**
   - ❌ BAD: `// Admin Panel Provider for FormBuilder` (obvious from class name)
   - ❌ BAD: `// Loop through users` (obvious from code)
   - ✅ GOOD: `// Skip validation for admin users due to performance requirements`

3. **Comments should add value**
   - If the comment just repeats what the code says, remove it
   - If the code is self-explanatory, no comment needed
   - Only comment when there's additional context or reasoning needed

4. **Document complex business logic**
   - ✅ GOOD: `// Apply 15% discount for bulk orders over 100 items`
   - ✅ GOOD: `// Cache for 24 hours to balance freshness with performance`

5. **Document non-obvious decisions**
   - ✅ GOOD: `// Using eager loading to prevent N+1 queries`
   - ✅ GOOD: `// Disable CSRF for webhook endpoints as per API spec`

## Anti-patterns to avoid

- Comments that state the obvious
- Comments that just repeat the method/class name
- Comments that describe what the code does (code should be self-documenting)
- Comments on simple getters/setters unless there's special logic
- Comments that are outdated or incorrect

## When to comment

- Complex business rules that aren't obvious from the code
- Performance optimizations and their reasoning
- Workarounds for third-party library limitations
- Security considerations
- API design decisions
- Database schema decisions that affect performance

## Examples

```php
// ❌ BAD - Obvious comment
class UserController extends Controller
{
    // Get all users
    public function index()
    {
        return User::all();
    }
}

// ✅ GOOD - Explains the why
class UserController extends Controller
{
    public function index()
    {
        // Paginate to prevent memory issues with large datasets
        return User::paginate(50);
    }
}
```

## Implementation

- Always review comments before committing
- If a comment just describes what the code does, remove it
- Focus on explaining the reasoning behind decisions
- Keep comments up to date with code changes
- Prefer self-documenting code over comments