# HR Portal Database Schema Reference

## Model/Table Overview

### Core Models (5 - Phase 1)
| Model | Table | Purpose |
|-------|-------|---------|
| DashboardMetric | dashboard_metrics | Dashboard statistics |
| JobPosting | job_postings | Job postings |
| Feature | features | Feature management |
| PageContent | page_content | Dynamic page content |
| ModuleCard | module_cards | Module cards |

### Complete Models (22 - Phase 2)

#### HR Management
| Model | Table | Key Fields | Status Field |
|-------|-------|-----------|--------------|
| Department | departments | name, code, head_id, budget | is_active |
| Team | teams | name, manager_id, department_id, status | is_active |
| TeamMap | team_maps | team_name, team_lead_id, member_count | is_active |
| RoleMaster | role_masters | name, code, permissions, salary_grade | is_active |

#### Recruitment & Hiring
| Model | Table | Key Fields | Status Field |
|-------|-------|-----------|--------------|
| HireDesk | hire_desks | position, department, vacancy_count, status | is_active |
| TalentHub | talent_hubs | position, applicant_details, status | is_active |
| OfferLetter | offer_letters | candidate_name, position, salary, status | is_active |

#### Employee Management
| Model | Table | Key Fields | Status Field |
|-------|-------|-----------|--------------|
| TalentVault | talent_vaults | employee_id, email, phone, salary | is_active |
| OnboardPro | onboard_pros | employee_id, joining_date, department | is_active |
| OffBoardDesk | offboard_desks | employee_id, exit_date, status | is_active |
| CurtainCall | curtain_calls | employee_id, resignation_date, status | is_active |
| Kyc | kycs | employee_id, aadhar_number, pan_number | is_active |

#### Attendance & Time Management
| Model | Table | Key Fields | Status Field |
|-------|-------|-----------|--------------|
| PulseLog | pulse_logs | employee_id, date, check_in_time, status | is_active |
| LeaveTrack | leave_tracks | employee_id, leave_type, date_range | is_active |
| TimeAway | time_aways | employee_id, start_date, end_date, type | is_active |

#### Payroll
| Model | Table | Key Fields | Status Field |
|-------|-------|-----------|--------------|
| PayPulse | pay_pulses | employee_id, month, salary, deductions | is_active |
| Payslip | payslips | employee_id, month, year, net_salary | is_active |

#### Operations
| Model | Table | Key Fields | Status Field |
|-------|-------|-----------|--------------|
| ProjectDesk | project_desks | name, manager_id, start_date, status | is_active |
| AuditTrail | audit_trails | user_id, action, description, changes | is_active |
| BuzzDesk | buzz_desks | title, content, category, is_featured | is_active |
| GrievanceCell | grievance_cells | employee_id, grievance_type, severity | is_active |
| LearnZone | learn_zones | title, course_type, instructor, category | is_active |

## Common Field Patterns

### All Models Include:
```
- id (unsigned big integer, primary key)
- is_active (boolean, default: true)
- created_at (timestamp)
- updated_at (timestamp)
```

### Foreign Key Fields Pattern:
```
- *_id fields reference users table or related table
- On delete: CASCADE for employee refs, SET NULL for optional refs
```

### Status Fields Pattern:
```
- enum('value1', 'value2', 'value3') in specific models
- Examples: pending/approved/rejected, open/in_progress/closed, etc.
```

### Financial Fields Pattern:
```
- decimal(12, 2) for salary/budget amounts
- decimal(8, 2) for hours/percentages
```

### Date Fields Pattern:
```
- date for single dates (birth_date, joining_date, etc.)
- time for time values (check_in_time, check_out_time)
- datetime for precise timestamps
```

## Validation Rules Used

### Email Fields
```
unique:table_name,email
email
```

### Unique Identifier Fields
```
unique:table_name,field_name
unique:table_name,field_name,id (for updates)
```

### Date Fields
```
date
date_format:Y-m-d
after_or_equal:other_date_field
```

### Numeric Fields
```
numeric
min:0
integer
decimal:2
```

### String Fields
```
max:255 (standard)
max:50 (code fields)
max:100 (category fields)
```

### Enum/Select Fields
```
in:value1,value2,value3
```

## Foreign Key Relationships

### To Users Table
- audit_trails.user_id → users.id
- curtain_calls.employee_id → users.id
- departments.head_id → users.id
- grievance_cells.employee_id → users.id
- grievance_cells.assigned_to → users.id
- hire_desks.* (no FK, just strings)
- kycs.employee_id → users.id
- kycs.verified_by → users.id
- onboard_pros.employee_id → users.id
- offer_letters.* (no FK, just strings)
- pay_pulses.employee_id → users.id
- payslips.employee_id → users.id
- project_desks.manager_id → users.id
- pulse_logs.employee_id → users.id
- talent_hubs.employee_id → users.id (optional)
- talent_vaults.employee_id → users.id
- team_maps.team_lead_id → users.id
- teams.manager_id → users.id
- time_aways.employee_id → users.id

### To Departments Table
- team_maps.department_id → departments.id
- teams.department_id → departments.id

## Migration Execution
After running `php artisan migrate`, all tables will be created with:
- Proper constraints
- Indexes on common query fields
- Foreign key relationships enforced
- Default values set appropriately

## Usage in Controllers

### Fetch All Active Records
```php
$records = Model::where('is_active', true)->orderBy('created_at', 'desc')->get();
```

### Fetch Single Record
```php
$record = Model::findOrFail($id);
```

### Create Record
```php
Model::create($validated_data);
```

### Update Record
```php
$record->update($validated_data);
```

### Soft Delete (Mark Inactive)
```php
$record->delete(); // Sets is_active to false if using soft deletes
```

## Next Steps
1. Run `php artisan migrate` to create all tables
2. Seed test data using factories if needed
3. Update Blade views to display dynamic data
4. Test CRUD operations for each module
5. Monitor audit trail for system activity
