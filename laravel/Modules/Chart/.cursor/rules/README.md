# Cursor Rules for Laraxot Development

## Core Rules

- [Clean Code Comments](clean-code-comments.md) - Principles for writing meaningful comments that explain WHY, not WHAT
- [Module Structure](module-structure.md) - Standards for Laravel module organization
- [PHPStan Compliance](phpstan-compliance.md) - Type safety and static analysis requirements
- [Documentation Standards](documentation-standards.md) - How to maintain project documentation

## Quick Reference

### Comments
- ❌ Never comment the obvious: `// This is a cat`
- ✅ Comment the reasoning: `// Cache for 24h to balance freshness with performance`
- ❌ Never repeat method names in comments
- ✅ Explain complex business logic or non-obvious decisions

### Code Quality
- Always use `declare(strict_types=1);`
- Extend base classes: `XotBaseServiceProvider`, `XotBasePanelProvider`
- Use Spatie Laravel Data for DTOs
- Use Spatie QueueableAction for async operations
- Pass PHPStan level 9+ analysis

### Documentation
- Update both module docs and root docs
- Create bidirectional links between related docs
- Document in `Modules/{ModuleName}/docs/` and `/docs/`
- Use lowercase filenames except `README.md`

## Implementation Checklist

- [ ] Code follows clean code comment principles
- [ ] Extends appropriate base classes
- [ ] Passes PHPStan level 9+
- [ ] Documentation updated with bidirectional links
- [ ] No hardcoded strings in UI components
- [ ] Uses translation files for all user-facing text