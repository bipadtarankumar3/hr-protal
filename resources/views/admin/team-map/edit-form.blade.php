<form id="editForm" method="POST">
    @csrf
    @method('PUT')
    <div class="row g-3">
        <div class="col-md-12">
            <label class="form-label">Team Name <span class="text-danger">*</span></label>
            <input type="text" name="team_name" id="edit_team_name" class="form-control @error('team_name') is-invalid @enderror" 
                   value="{{ old('team_name', $team_map->team_name) }}" required>
            @error('team_name') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Department <span class="text-danger">*</span></label>
            <select name="department_id" id="edit_department_id" class="form-select @error('department_id') is-invalid @enderror" required>
                <option value="">Select Department</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}" {{ old('department_id', $team_map->department_id) == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            </select>
            @error('department_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Team Lead <span class="text-danger">*</span></label>
            <select name="team_lead_id" id="edit_team_lead_id" class="form-select @error('team_lead_id') is-invalid @enderror" required>
                <option value="">Select Team Lead</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('team_lead_id', $team_map->team_lead_id) == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
            @error('team_lead_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Member Count <span class="text-danger">*</span></label>
            <input type="number" name="member_count" id="edit_member_count" class="form-control @error('member_count') is-invalid @enderror" 
                   value="{{ old('member_count', $team_map->member_count) }}" min="1" required>
            @error('member_count') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-6">
            <label class="form-label">Focus Area</label>
            <input type="text" name="focus_area" id="edit_focus_area" class="form-control @error('focus_area') is-invalid @enderror" 
                   value="{{ old('focus_area', $team_map->focus_area) }}">
            @error('focus_area') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-12">
            <label class="form-label">Description</label>
            <textarea name="description" id="edit_description" class="form-control @error('description') is-invalid @enderror" 
                      rows="3">{{ old('description', $team_map->description) }}</textarea>
            @error('description') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>
        <div class="col-md-12">
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="is_active" id="edit_is_active" value="1" 
                       {{ old('is_active', $team_map->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="edit_is_active">Active</label>
            </div>
        </div>
    </div>
</form>

