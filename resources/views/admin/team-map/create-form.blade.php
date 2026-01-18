<form id="createForm" method="POST" action="{{ route('team-maps.store') }}">
    @csrf
    <div class="row g-3">
        <div class="col-md-12">
            <label class="form-label">Team Name <span class="text-danger">*</span></label>
            <input type="text" name="team_name" class="form-control @error('team_name') is-invalid @enderror" 
                   placeholder="e.g. Development Team" value="{{ old('team_name') }}" required>
            @error('team_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Department <span class="text-danger">*</span></label>
            <select name="department_id" class="form-select @error('department_id') is-invalid @enderror" required>
                <option value="">Select Department</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}" {{ old('department_id') == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            </select>
            @error('department_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Team Lead <span class="text-danger">*</span></label>
            <select name="team_lead_id" class="form-select @error('team_lead_id') is-invalid @enderror" required>
                <option value="">Select Team Lead</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('team_lead_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @error('team_lead_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Member Count <span class="text-danger">*</span></label>
            <input type="number" name="member_count" class="form-control @error('member_count') is-invalid @enderror" 
                   placeholder="e.g. 5" value="{{ old('member_count', 1) }}" min="1" required>
            @error('member_count') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Focus Area</label>
            <input type="text" name="focus_area" class="form-control @error('focus_area') is-invalid @enderror" 
                   placeholder="e.g. Backend Development" value="{{ old('focus_area') }}">
            @error('focus_area') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" 
                      rows="3" placeholder="Team description...">{{ old('description') }}</textarea>
            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-12">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="create_is_active" value="1" checked>
                <label class="form-check-label" for="create_is_active">Active</label>
            </div>
        </div>
    </div>
</form>

