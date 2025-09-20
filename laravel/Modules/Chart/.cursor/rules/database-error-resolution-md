# Database Error Resolution Guidelines

## When
When an `Internal Server Error` or `Illuminate\Database\QueryException` occurs due to missing tables or columns in the database.

## Then
1. **Analyze the Error**: Identify the missing database table or column causing the error from the stack trace.
2. **Update Documentation**: Document the error and resolution steps in the relevant module's `docs` folder, ensuring bidirectional links to root documentation.
3. **Create Migration**: Generate a new migration file to create the missing table or column with appropriate foreign keys and constraints.
4. **Run Migration**: Execute `php artisan migrate` to apply the database changes.
5. **Add Safeguards**: Modify the code to handle cases where the table might not exist yet, preventing errors during migration phases.

## Because
- Missing database tables or columns can halt application functionality, and immediate resolution ensures continuity.
- Documentation keeps track of recurring issues and solutions, aiding future debugging.
- Adding safeguards in code prevents errors during deployment or when migrations are pending.

## Examples
- **Missing `doctor_team` Table**: Resolved by creating a migration `2025_05_17_000001_create_doctor_team_table.php` and updating `BaseUser.php` to check for table existence before querying.
