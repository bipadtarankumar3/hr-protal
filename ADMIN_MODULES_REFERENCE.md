# HR Portal - Complete Admin Modules Reference

## All Admin Modules - Now Fully Dynamic! ✅

### Module Summary
Total Modules: **22 Dynamic Admin Modules**
All with: Full CRUD Operations, Database Integration, Validation, Error Handling

---

## 1. 🏢 Departments Module
- **Model**: `App\Models\Department`
- **Controller**: `DepartmentController`
- **Table**: `departments`
- **Routes**: `/admin/departments`
- **Key Fields**: name, code, head_id, budget, is_active
- **Features**: Department management, budget tracking, head assignment
- **Unique Fields**: name, code

---

## 2. 👥 Teams Module
- **Model**: `App\Models\Team`
- **Controller**: `TeamController`
- **Table**: `teams`
- **Routes**: `/admin/teams`
- **Key Fields**: name, manager_id, department_id, status, is_active
- **Features**: Team creation, manager assignment, status tracking
- **Status Values**: active, inactive, pending

---

## 3. 📍 Team Map Module
- **Model**: `App\Models\TeamMap`
- **Controller**: `TeamMapController`
- **Table**: `team_maps`
- **Routes**: `/admin/team-map`
- **Key Fields**: department_id, team_name, team_lead_id, member_count
- **Features**: Team structure mapping, team lead assignment, member count

---

## 4. 👔 Role Master Module
- **Model**: `App\Models\RoleMaster`
- **Controller**: `RoleMasterController`
- **Table**: `role_masters`
- **Routes**: `/admin/role-master`
- **Key Fields**: name, code, description, permissions, salary_grade
- **Features**: Role definition, permission management, salary grading
- **Unique Fields**: name, code

---

## 5. 💼 Hire Desk Module (Recruitment)
- **Model**: `App\Models\HireDesk`
- **Controller**: `HireDeskController`
- **Table**: `hire_desks`
- **Routes**: `/admin/hire-desk`
- **Key Fields**: position, department, vacancy_count, status, opening_date, closing_date
- **Features**: Job opening management, vacancy tracking, closing dates
- **Status Values**: open, ongoing, closed

---

## 6. 🎯 Talent Hub Module (Recruitment)
- **Model**: `App\Models\TalentHub`
- **Controller**: `TalentHubController`
- **Table**: `talent_hubs`
- **Routes**: `/admin/talent-hub`
- **Key Fields**: position, applicant_details, qualifications, experience, status
- **Features**: Applicant tracking, recruitment pipeline management
- **Status Values**: applied, shortlisted, interviewed, offered, rejected

---

## 7. 📄 Offer Letter Module
- **Model**: `App\Models\OfferLetter`
- **Controller**: `OfferLetterController`
- **Table**: `offer_letters`
- **Routes**: `/admin/offer-letters`
- **Key Fields**: candidate_name, position, salary, joining_date, status
- **Features**: Offer letter generation, acceptance tracking
- **Status Values**: draft, sent, accepted, rejected

---

## 8. 📚 Talent Vault Module (Employee Database)
- **Model**: `App\Models\TalentVault`
- **Controller**: `TalentVaultController`
- **Table**: `talent_vaults`
- **Routes**: `/admin/talent-vaults`
- **Key Fields**: employee_id, email, phone, salary, qualifications
- **Features**: Employee database, profile management, salary tracking
- **Unique Fields**: employee_id, email

---

## 9. 🚀 Onboard Pro Module (Onboarding)
- **Model**: `App\Models\OnboardPro`
- **Controller**: `OnboardProController`
- **Table**: `onboard_pros`
- **Routes**: `/admin/onboard-pro`
- **Key Fields**: employee_id, joining_date, department, mentor_assigned, checklist_status
- **Features**: Employee onboarding tracking, training completion, orientation
- **Boolean Fields**: training_completed, orientation_done

---

## 10. 🚪 Offboard Desk Module (Offboarding)
- **Model**: `App\Models\OffBoardDesk`
- **Controller**: `OffBoardDeskController`
- **Table**: `offboard_desks`
- **Routes**: `/admin/offboard-desk`
- **Key Fields**: employee_id, exit_date, checklist_status, documents_returned, final_settlement
- **Features**: Employee exit process tracking, clearance checklist
- **Boolean Fields**: documents_returned, final_settlement, reference_provided

---

## 11. 👋 Curtain Call Module (Resignations)
- **Model**: `App\Models\CurtainCall`
- **Controller**: `CurtainCallController`
- **Table**: `curtain_calls`
- **Routes**: `/admin/curtain-call`
- **Key Fields**: employee_id, resignation_date, last_working_day, exit_interview_date, status
- **Features**: Resignation management, exit interview scheduling
- **Status Values**: pending, accepted, rejected

---

## 12. 🔐 KYC Module (Verification)
- **Model**: `App\Models\Kyc`
- **Controller**: `KycController`
- **Table**: `kycs`
- **Routes**: `/admin/kyc`
- **Key Fields**: employee_id, aadhar_number, pan_number, bank_account, ifsc_code, verification_status
- **Features**: KYC verification, document tracking, verification status
- **Status Values**: pending, verified, rejected
- **Unique Fields**: aadhar_number, pan_number

---

## 13. 📅 Leave Track Module
- **Model**: `App\Models\LeaveTrack`
- **Controller**: `LeaveTrackController`
- **Table**: `leave_tracks`
- **Routes**: `/admin/leave-track`
- **Key Fields**: employee_id, leave_type, start_date, end_date, reason, status
- **Features**: Leave application tracking, approval workflow
- **Status Values**: pending, approved, rejected

---

## 14. ⏰ Time Away Module
- **Model**: `App\Models\TimeAway`
- **Controller**: `TimeAwayController`
- **Table**: `time_aways`
- **Routes**: `/admin/time-away`
- **Key Fields**: employee_id, start_date, end_date, reason, type, status
- **Features**: Time off management, different leave types
- **Type Values**: vacation, sick_leave, personal, other
- **Status Values**: pending, approved, rejected

---

## 15. ⏱️ Pulse Log Module (Attendance)
- **Model**: `App\Models\PulseLog`
- **Controller**: `PulseLogController`
- **Table**: `pulse_logs`
- **Routes**: `/admin/pulse-log`
- **Key Fields**: employee_id, date, check_in_time, check_out_time, duration_hours, status
- **Features**: Daily attendance tracking, time duration calculation
- **Status Values**: present, absent, late, on_leave

---

## 16. 💰 Pay Pulse Module (Payroll)
- **Model**: `App\Models\PayPulse`
- **Controller**: `PayPulseController`
- **Table**: `pay_pulses`
- **Routes**: `/admin/pay-pulse`
- **Key Fields**: employee_id, month, salary, basic_salary, gross_salary, deductions
- **Features**: Payroll management, salary calculations, deduction tracking
- **Decimal Fields**: salary (12,2), basic_salary (12,2), gross_salary (12,2)

---

## 17. 📊 Payslip Module
- **Model**: `App\Models\Payslip`
- **Controller**: `PayslipController`
- **Table**: `payslips`
- **Routes**: `/admin/payslips`
- **Key Fields**: employee_id, month, year, basic_salary, gross_salary, net_salary, deductions, allowances
- **Features**: Payslip generation, salary breakdown, month/year tracking
- **Special Method**: generate() - for payslip generation
- **Decimal Fields**: All financial fields use decimal(12,2)

---

## 18. 📁 Project Desk Module (Projects)
- **Model**: `App\Models\ProjectDesk`
- **Controller**: `ProjectDeskController`
- **Table**: `project_desks`
- **Routes**: `/admin/project-desk`
- **Key Fields**: name, manager_id, start_date, end_date, status, budget
- **Features**: Project management, timeline tracking, budget management
- **Status Values**: planning, active, completed, on_hold

---

## 19. 📢 Buzz Desk Module (News)
- **Model**: `App\Models\BuzzDesk`
- **Controller**: `BuzzDeskController`
- **Table**: `buzz_desks`
- **Routes**: `/admin/buzz-desk`
- **Key Fields**: title, content, category, posted_by, is_featured
- **Features**: Company announcements, news management, featured content
- **Boolean Field**: is_featured

---

## 20. 🎓 Learn Zone Module (Training)
- **Model**: `App\Models\LearnZone`
- **Controller**: `LearnZoneController`
- **Table**: `learn_zones`
- **Routes**: `/admin/learn-zone`
- **Key Fields**: title, description, course_type, instructor, duration_hours, category
- **Features**: Training content management, course tracking, instructor assignment

---

## 21. 💔 Grievance Cell Module
- **Model**: `App\Models\GrievanceCell`
- **Controller**: `GrievanceCellController`
- **Table**: `grievance_cells`
- **Routes**: `/admin/grievance-cell`
- **Key Fields**: employee_id, grievance_type, description, severity, assigned_to, status, resolution
- **Features**: Grievance management, resolution tracking, severity classification
- **Severity Values**: low, medium, high
- **Status Values**: open, in_progress, resolved, closed

---

## 22. 📋 Audit Trail Module
- **Model**: `App\Models\AuditTrail`
- **Controller**: `AuditTrailController`
- **Table**: `audit_trails`
- **Routes**: `/admin/audit-trail`
- **Key Fields**: user_id, action, description, changes, ip_address
- **Features**: System activity logging, audit tracking, IP logging
- **Special Field**: IP address logging for security

---

## Module Access Structure

### RESTful Routing Pattern
All modules follow this consistent routing pattern:

```
GET    /admin/{module}              → List all active records
GET    /admin/{module}/create       → Show create form
POST   /admin/{module}              → Store new record
GET    /admin/{module}/{id}         → Show single record
GET    /admin/{module}/{id}/edit    → Show edit form
PUT    /admin/{module}/{id}         → Update record
DELETE /admin/{module}/{id}         → Delete record
```

### URL Format Examples
- `/admin/departments` - List all departments
- `/admin/departments/create` - Create new department
- `/admin/departments/1` - View department ID 1
- `/admin/departments/1/edit` - Edit department ID 1
- `/admin/teams` - List all teams
- `/admin/teams/2/edit` - Edit team ID 2

---

## Database Integration Features

### Common Features Across All Modules
✅ Eloquent ORM integration
✅ Model-based queries
✅ Validation on all inputs
✅ Foreign key constraints
✅ Timestamp tracking (created_at, updated_at)
✅ Active status field (is_active)
✅ Error handling (404s, validation errors)
✅ Success/failure messages
✅ Proper HTTP redirects

### Relationship Features
- Foreign keys to users table
- Cascading deletes where appropriate
- Set null on optional foreign keys
- Proper constraint enforcement

### Data Integrity Features
- Unique field constraints
- Email validation
- Date range validation
- Numeric range validation
- Enum value validation
- Required field validation

---

## Quick Setup Instructions

### 1. Apply Migrations
```bash
php artisan migrate
```
Creates all 22 database tables

### 2. Test Each Module
```bash
# Navigate to admin panel
http://localhost/admin/departments
http://localhost/admin/teams
http://localhost/admin/pay-pulse
# ... etc for all 22 modules
```

### 3. CRUD Operations
- Click "Create" to add new record
- Click "Edit" to modify existing record
- Click "Delete" to remove record
- View list to see all active records

---

## Module Dependencies

### Departments (parent)
↓ Used by: Teams, Team Map, Pay Structure

### Teams (references Departments)
↓ Used by: Team Map, Project Desk

### Users (parent)
↓ Used by: All employee-related modules

### Role Master
↓ Used by: Employee assignment

### Hire Desk → Talent Hub → Offer Letter → Onboard Pro
(Recruitment pipeline)

### Curtain Call ← Employee → Offboard Desk
(Exit pipeline)

---

## Status: ALL MODULES DYNAMIC ✅

Every admin module now:
- ✅ Reads from database
- ✅ Writes to database
- ✅ Updates records in database
- ✅ Deletes records from database
- ✅ Validates all input
- ✅ Handles all errors
- ✅ Tracks all timestamps
- ✅ Maintains data integrity

**Ready for production use!**

---

**Last Updated:** 2026-01-18
**Total Modules:** 22 ✅
**CRUD Operations:** 100% Implemented ✅
**Database Integration:** Complete ✅
