<div class="row g-3">
    <div class="col-md-6">
        <strong>Employee:</strong><br>
        @if($pulse_log->employee)
            <span>{{ $pulse_log->employee->name }}</span>
            <br><small class="text-muted">{{ $pulse_log->employee->email }}</small>
        @else
            <span class="text-muted">N/A</span>
        @endif
    </div>
    <div class="col-md-6">
        <strong>Date:</strong><br>
        <span>{{ $pulse_log->date->format('d M Y') }}</span>
    </div>
    <div class="col-md-6">
        <strong>Check In Time:</strong><br>
        @if($pulse_log->check_in_time)
            <span class="badge bg-success">{{ date('h:i A', strtotime($pulse_log->check_in_time)) }}</span>
        @else
            <span class="text-muted">N/A</span>
        @endif
    </div>
    <div class="col-md-6">
        <strong>Check Out Time:</strong><br>
        @if($pulse_log->check_out_time)
            <span class="badge bg-info">{{ date('h:i A', strtotime($pulse_log->check_out_time)) }}</span>
        @else
            <span class="text-muted">Not checked out</span>
        @endif
    </div>
    <div class="col-md-6">
        <strong>Duration:</strong><br>
        @if($pulse_log->duration_hours)
            <span class="badge bg-primary">{{ number_format($pulse_log->duration_hours, 2) }} hours</span>
        @else
            <span class="text-muted">N/A</span>
        @endif
    </div>
    <div class="col-md-6">
        <strong>Status:</strong><br>
        @php
            $statusColors = [
                'present' => 'success',
                'absent' => 'danger',
                'late' => 'warning',
                'on_leave' => 'info'
            ];
            $color = $statusColors[$pulse_log->status] ?? 'secondary';
        @endphp
        <span class="badge bg-{{ $color }}">
            {{ ucfirst(str_replace('_', ' ', $pulse_log->status)) }}
        </span>
    </div>
    <div class="col-md-6">
        <strong>Active:</strong><br>
        @if($pulse_log->is_active)
            <span class="badge bg-success">Active</span>
        @else
            <span class="badge bg-secondary">Inactive</span>
        @endif
    </div>
    <div class="col-md-6">
        <strong>Created At:</strong><br>
        <span>{{ $pulse_log->created_at->format('d M Y, h:i A') }}</span>
    </div>
    <div class="col-md-6">
        <strong>Updated At:</strong><br>
        <span>{{ $pulse_log->updated_at->format('d M Y, h:i A') }}</span>
    </div>
</div>

