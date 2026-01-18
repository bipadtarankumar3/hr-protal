<form id="createForm" method="POST" action="{{ route('pulse-logs.store') }}">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">Employee <span class="text-danger">*</span></label>
            <select name="employee_id" class="form-select @error('employee_id') is-invalid @enderror" required>
                <option value="">Select Employee</option>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}" {{ old('employee_id') == $emp->id ? 'selected' : '' }}>
                        {{ $emp->name }} ({{ $emp->email }})
                    </option>
                @endforeach
            </select>
            @error('employee_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Date <span class="text-danger">*</span></label>
            <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" 
                   value="{{ old('date', date('Y-m-d')) }}" required>
            @error('date') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Check In Time <span class="text-danger">*</span></label>
            <input type="time" name="check_in_time" class="form-control @error('check_in_time') is-invalid @enderror" 
                   value="{{ old('check_in_time', '09:00') }}" required>
            @error('check_in_time') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Check Out Time</label>
            <input type="time" name="check_out_time" class="form-control @error('check_out_time') is-invalid @enderror" 
                   value="{{ old('check_out_time') }}">
            @error('check_out_time') <span class="invalid-feedback">{{ $message }}</span> @enderror
            <small class="text-muted">Leave blank if not checked out</small>
        </div>
        <div class="col-md-6">
            <label class="form-label">Duration (Hours)</label>
            <input type="number" name="duration_hours" step="0.01" class="form-control @error('duration_hours') is-invalid @enderror" 
                   placeholder="Auto-calculated if check out time provided" value="{{ old('duration_hours') }}" min="0" max="24">
            @error('duration_hours') <span class="invalid-feedback">{{ $message }}</span> @enderror
            <small class="text-muted">Will be auto-calculated if check out time is provided</small>
        </div>
        <div class="col-md-6">
            <label class="form-label">Status <span class="text-danger">*</span></label>
            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                <option value="present" {{ old('status', 'present') == 'present' ? 'selected' : '' }}>Present</option>
                <option value="absent" {{ old('status') == 'absent' ? 'selected' : '' }}>Absent</option>
                <option value="late" {{ old('status') == 'late' ? 'selected' : '' }}>Late</option>
                <option value="on_leave" {{ old('status') == 'on_leave' ? 'selected' : '' }}>On Leave</option>
            </select>
            @error('status') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-12">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="create_is_active" value="1" checked>
                <label class="form-check-label" for="create_is_active">Active</label>
            </div>
        </div>
    </div>
</form>

