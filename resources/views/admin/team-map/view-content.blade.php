<div class="row g-3">
    <div class="col-md-6">
        <strong>Team Name:</strong><br>
        <span>{{ $team_map->team_name }}</span>
    </div>
    <div class="col-md-6">
        <strong>Department:</strong><br>
        @if($team_map->department)
            <span class="badge bg-info">{{ $team_map->department->name }}</span>
        @else
            <span class="text-muted">N/A</span>
        @endif
    </div>
    <div class="col-md-6">
        <strong>Team Lead:</strong><br>
        @if($team_map->teamLead)
            <span>{{ $team_map->teamLead->name }}</span>
            <small class="text-muted d-block">{{ $team_map->teamLead->email }}</small>
        @else
            <span class="text-muted">Unassigned</span>
        @endif
    </div>
    <div class="col-md-6">
        <strong>Member Count:</strong><br>
        <span class="badge bg-primary">{{ $team_map->member_count }}</span>
    </div>
    <div class="col-md-6">
        <strong>Focus Area:</strong><br>
        <span>{{ $team_map->focus_area ?? 'N/A' }}</span>
    </div>
    <div class="col-md-6">
        <strong>Status:</strong><br>
        @if($team_map->is_active)
            <span class="badge bg-success">Active</span>
        @else
            <span class="badge bg-secondary">Inactive</span>
        @endif
    </div>
    <div class="col-md-12">
        <strong>Description:</strong><br>
        <span>{{ $team_map->description ?? 'N/A' }}</span>
    </div>
    <div class="col-md-6">
        <strong>Created At:</strong><br>
        <span>{{ $team_map->created_at->format('d M Y, h:i A') }}</span>
    </div>
    <div class="col-md-6">
        <strong>Updated At:</strong><br>
        <span>{{ $team_map->updated_at->format('d M Y, h:i A') }}</span>
    </div>
</div>

