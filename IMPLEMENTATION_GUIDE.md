# HR Portal Implementation & Testing Guide

## Overview
This document provides implementation details, API endpoints, testing procedures, and troubleshooting for the complete HR Portal dynamization.

## File Structure Changes

### New Files Created

#### Models (22 files)
Location: `app/Models/`
- AuditTrail.php
- BuzzDesk.php
- CurtainCall.php
- Department.php
- GrievanceCell.php
- HireDesk.php
- Kyc.php
- LearnZone.php
- LeaveTrack.php (Phase 1)
- OffBoardDesk.php
- OfferLetter.php
- OnboardPro.php
- PayPulse.php (Phase 1)
- Payslip.php
- ProjectDesk.php
- PulseLog.php
- RoleMaster.php
- TalentHub.php (Phase 1)
- TalentVault.php (Phase 1)
- TeamMap.php
- Team.php
- TimeAway.php

#### Controllers Updated (25 files)
Location: `app/Http/Controllers/Admin/`
- All controllers now have full CRUD with model integration

#### Migrations (24 files)
Location: `database/migrations/`
- 2026_01_18_000008 through 2026_01_18_000025
- Each migration creates corresponding database table

## Database Migration Steps

### 1. Backup Existing Database (Recommended)
```bash
# MySQL backup
mysqldump -u root -p hr_portal > backup_$(date +%Y%m%d_%H%M%S).sql
```

### 2. Run New Migrations
```bash
# Run all pending migrations
php artisan migrate

# If you need to rollback (careful!)
php artisan migrate:rollback --step=24

# Check migration status
php artisan migrate:status
```

### 3. Verify Tables Created
```bash
# Check via Laravel tinker
php artisan tinker
>>> DB::table('information_schema.TABLES')->where('TABLE_SCHEMA', env('DB_DATABASE'))->count()
>>> exit()
```

## API Endpoints Reference

### Admin CRUD Endpoints

Each module follows this RESTful pattern:

```
GET    /admin/{module}              - List all active records
GET    /admin/{module}/create       - Show create form
POST   /admin/{module}              - Store new record
GET    /admin/{module}/{id}         - Show single record
GET    /admin/{module}/{id}/edit    - Show edit form
PUT    /admin/{module}/{id}         - Update record
DELETE /admin/{module}/{id}         - Delete record
```

### Specific Module Endpoints

**Departments**
- GET /admin/departments
- POST /admin/departments
- PUT /admin/departments/{id}
- DELETE /admin/departments/{id}

**Teams**
- GET /admin/teams
- POST /admin/teams
- PUT /admin/teams/{id}
- DELETE /admin/teams/{id}

**Payroll (PayPulse)**
- GET /admin/pay-pulse
- POST /admin/pay-pulse
- PUT /admin/pay-pulse/{id}
- DELETE /admin/pay-pulse/{id}

**Attendance (PulseLog)**
- GET /admin/pulse-log
- POST /admin/pulse-log
- PUT /admin/pulse-log/{id}
- DELETE /admin/pulse-log/{id}

**Recruitment (TalentHub)**
- GET /admin/talent-hub
- POST /admin/talent-hub
- PUT /admin/talent-hub/{id}
- DELETE /admin/talent-hub/{id}

*And so on for all 25 modules...*

## Testing Procedures

### 1. Unit Testing Models

```php
// Test Model Creation
$department = Department::create([
    'name' => 'Engineering',
    'code' => 'ENG',
    'is_active' => true,
]);
assert($department->id !== null);
assert($department->name === 'Engineering');

// Test Model Retrieval
$dept = Department::find($department->id);
assert($dept->name === 'Engineering');

// Test Model Update
$dept->update(['name' => 'Tech']);
assert($dept->name === 'Tech');

// Test Model Deletion
$dept->delete();
assert($dept->is_active === false); // Soft delete
```

### 2. Feature Testing Controllers

```php
// Test listing
$response = $this->get('/admin/departments');
$response->assertStatus(200);

// Test create form
$response = $this->get('/admin/departments/create');
$response->assertStatus(200);

// Test store
$response = $this->post('/admin/departments', [
    'name' => 'HR',
    'code' => 'HR',
    'head_id' => null,
    'budget' => 50000,
]);
$response->assertRedirect('/admin/departments');

// Test update
$response = $this->put('/admin/departments/1', [
    'name' => 'Human Resources',
    'code' => 'HR',
]);
$response->assertRedirect('/admin/departments');

// Test delete
$response = $this->delete('/admin/departments/1');
$response->assertRedirect('/admin/departments');
```

### 3. Integration Testing

```php
// Create full workflow
$dept = Department::create([
    'name' => 'Sales',
    'code' => 'SALES',
    'budget' => 100000,
]);

// Create team in department
$team = Team::create([
    'name' => 'Sales Team 1',
    'manager_id' => 1,
    'department_id' => $dept->id,
    'status' => 'active',
]);

// Create team mapping
$teamMap = TeamMap::create([
    'department_id' => $dept->id,
    'team_name' => 'Sales Team 1',
    'team_lead_id' => 1,
    'member_count' => 5,
]);

// Verify relationships
assert($team->department->id === $dept->id);
assert($teamMap->department->id === $dept->id);
```

## Validation Testing

### Test Each Controller's Validation

```bash
# Test Department validation
curl -X POST http://localhost:8000/admin/departments \
  -H "Content-Type: application/json" \
  -d '{
    "code": "TEST"
    # Missing "name" - should fail validation
  }'

# Test required field
curl -X POST http://localhost:8000/admin/departments \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Test Dept",
    "code": "TEST"
  }'
# Should succeed

# Test unique constraint
curl -X POST http://localhost:8000/admin/departments \
  -H "Content-Type: application/json" \
  -d '{
    "name": "Sales",  # Duplicate name
    "code": "UNIQUE_CODE"
  }'
# Should fail with unique validation error
```

## Troubleshooting Guide

### Issue: Migration Fails with Foreign Key Error
**Solution:**
```bash
# Check if foreign tables exist
php artisan migrate:status

# If referenced tables don't exist, run all migrations in order
php artisan migrate:refresh

# Or specify which migrations to run
php artisan migrate --path=database/migrations/2026_01_18_000001_create_users_table.php
```

### Issue: Model Not Found
**Solution:**
```bash
# Ensure model is properly imported in controller
use App\Models\Department;

# Check namespace is correct
php artisan tinker
>>> use App\Models\Department;
>>> Department::all();
```

### Issue: Validation Not Working
**Solution:**
```php
// Check request validation in controller
$validated = $request->validate([
    'name' => 'required|string|max:255|unique:departments,name',
]);

// Debug by checking what's being passed
dd($request->all());
dd($validated);
```

### Issue: Soft Delete Not Working
**Solution:**
```php
// Ensure model uses SoftDeletes trait (if implemented)
use SoftDeletes;

// Or use is_active boolean approach (currently implemented)
$records = Model::where('is_active', true)->get();
```

### Issue: Foreign Key Constraint Fails
**Solution:**
```php
// Ensure referenced record exists
$dept = Department::find($dept_id);
if (!$dept) {
    // Parent record doesn't exist
    return redirect()->back()->withErrors('Department not found');
}

// Create child record
$team->department_id = $dept->id;
$team->save();
```

## Performance Optimization Tips

### 1. Add Indexes
```php
// In migration
$table->index('is_active');
$table->index('created_at');
$table->index('employee_id');
$table->index(['department_id', 'is_active']); // Composite index
```

### 2. Eager Loading
```php
// In controller
$teams = Team::with('manager', 'department')
    ->where('is_active', true)
    ->get();
```

### 3. Pagination
```php
// In controller instead of get()
$records = Model::where('is_active', true)
    ->orderBy('created_at', 'desc')
    ->paginate(15);
```

### 4. Query Optimization
```php
// Use select() to fetch only needed columns
$teams = Team::select(['id', 'name', 'manager_id', 'department_id'])
    ->where('is_active', true)
    ->get();
```

## Security Measures Implemented

✅ Model validation on all input
✅ Foreign key constraints in database
✅ is_active boolean for data integrity
✅ Route model binding with findOrFail()
✅ Mass assignment protection via fillable arrays
✅ Type casting on model properties
✅ SQL injection prevention via Eloquent ORM

## Common Development Tasks

### Add New Field to Existing Model
```bash
# Create migration
php artisan make:migration add_field_to_departments_table --table=departments

# Edit migration file
// In up() method
$table->string('field_name')->after('name');

# Run migration
php artisan migrate
```

### Add New Model/Controller
```bash
# Create model with migration
php artisan make:model NewModule -m

# Create controller
php artisan make:controller Admin/NewModuleController --resource
```

### Update Existing Data
```bash
# Use tinker to update
php artisan tinker
>>> use App\Models\Department;
>>> Department::where('code', 'OLD')->update(['code' => 'NEW']);
>>> exit()
```

## Monitoring & Maintenance

### Check Database Size
```bash
# Via MySQL CLI
SELECT table_name, ROUND(((data_length + index_length) / 1024 / 1024), 2) AS size_mb
FROM information_schema.tables
WHERE table_schema = 'hr_portal'
ORDER BY size_mb DESC;
```

### Audit Trail Usage
```php
// Log actions to audit trail
AuditTrail::create([
    'user_id' => auth()->id(),
    'action' => 'created_department',
    'description' => 'Department created: Engineering',
    'ip_address' => request()->ip(),
]);
```

### Performance Monitoring
```php
// Check slow queries
DB::listen(function($query) {
    if ($query->time > 1000) { // > 1 second
        Log::warning('Slow query: ' . $query->sql);
    }
});
```

## Deployment Checklist

- [ ] Backup current database
- [ ] Review all migration files
- [ ] Test migrations on staging environment
- [ ] Run `php artisan migrate` on production
- [ ] Clear cache: `php artisan cache:clear`
- [ ] Clear config: `php artisan config:clear`
- [ ] Monitor application logs
- [ ] Verify all CRUD endpoints working
- [ ] Test with different user roles
- [ ] Check database growth trends
- [ ] Document any manual data updates needed

## Support & Maintenance

### Regular Tasks
- Monitor audit trails for suspicious activity
- Review error logs weekly
- Optimize slow queries
- Update model relationships as needed
- Test backup/restore procedures monthly

### Documentation
- Keep API documentation current
- Document custom validation rules
- Maintain schema changelog
- Record performance baselines
