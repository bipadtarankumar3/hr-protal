<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function department()
    {
        return $this->belongsTo(Department::class, 'head_id');
    }

    public function teams()
    {
        return $this->hasMany(Team::class, 'manager_id');
    }

    public function teamMaps()
    {
        return $this->hasMany(TeamMap::class, 'team_lead_id');
    }

    public function leaveTracks()
    {
        return $this->hasMany(LeaveTrack::class, 'employee_id');
    }

    public function approvedLeaves()
    {
        return $this->hasMany(LeaveTrack::class, 'approved_by');
    }

    public function timeAways()
    {
        return $this->hasMany(TimeAway::class, 'employee_id');
    }

    public function approvedTimeAways()
    {
        return $this->hasMany(TimeAway::class, 'approved_by');
    }

    public function payslips()
    {
        return $this->hasMany(Payslip::class, 'employee_id');
    }

    public function payPulses()
    {
        return $this->hasMany(PayPulse::class, 'employee_id');
    }

    public function onboardPros()
    {
        return $this->hasMany(OnboardPro::class, 'employee_id');
    }

    public function talentHubs()
    {
        return $this->hasMany(TalentHub::class, 'employee_id');
    }

    public function talentVaults()
    {
        return $this->hasMany(TalentVault::class, 'employee_id');
    }

    public function projects()
    {
        return $this->hasMany(ProjectDesk::class, 'manager_id');
    }

    public function pulseLogs()
    {
        return $this->hasMany(PulseLog::class, 'employee_id');
    }

    public function kycs()
    {
        return $this->hasMany(Kyc::class, 'employee_id');
    }

    public function grievanceCells()
    {
        return $this->hasMany(GrievanceCell::class, 'employee_id');
    }

    public function curtainCalls()
    {
        return $this->hasMany(CurtainCall::class, 'employee_id');
    }

    public function offBoardDesks()
    {
        return $this->hasMany(OffBoardDesk::class, 'employee_id');
    }

    public function auditTrails()
    {
        return $this->hasMany(AuditTrail::class, 'user_id');
    }

    public function hireDesks()
    {
        return $this->hasMany(HireDesk::class, 'interviewer_id');
    }
}
