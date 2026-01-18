@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Page Content</h4>
      <p class="text-muted mb-0">Manage dynamic content across pages.</p>
    </div>
    <a href="{{ url('/admin/page-content/create') }}" class="btn btn-primary"><i class="ri ri-add-line"></i> Add Content</a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr>
            <th>Page</th>
            <th>Section</th>
            <th>Title</th>
            <th>Type</th>
            <th>Order</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pages as $page)
          <tr>
            <td><span class="badge bg-primary">{{ $page->page_name }}</span></td>
            <td>{{ $page->section_name }}</td>
            <td>{{ Str::limit($page->title, 30) }}</td>
            <td>{{ $page->image ? 'Image' : 'Text' }}</td>
            <td>{{ $page->sort_order }}</td>
            <td class="text-end">
              <a href="{{ url('/admin/page-content/' . $page->id . '/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
              <form action="{{ url('/admin/page-content/' . $page->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="6" class="text-center text-muted">No content found. <a href="{{ url('/admin/page-content/create') }}">Create one</a></td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
