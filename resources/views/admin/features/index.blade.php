@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Features</h4>
      <p class="text-muted mb-0">Manage features displayed on the home page.</p>
    </div>
    <a href="{{ url('/admin/features/create') }}" class="btn btn-primary"><i class="ri ri-add-line"></i> Add Feature</a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr>
            <th>Feature Name</th>
            <th>Icon</th>
            <th>Description</th>
            <th>Order</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($features as $feature)
          <tr>
            <td>{{ $feature->feature_name }}</td>
            <td><i class="{{ $feature->icon_class }}"></i></td>
            <td>{{ Str::limit($feature->description, 50) }}</td>
            <td>{{ $feature->sort_order }}</td>
            <td class="text-end">
              <a href="{{ url('/admin/features/' . $feature->id . '/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
              <form action="{{ url('/admin/features/' . $feature->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-muted">No features found. <a href="{{ url('/admin/features/create') }}">Create one</a></td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
