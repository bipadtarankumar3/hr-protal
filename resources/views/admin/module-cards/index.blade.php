@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h4 class="fw-semibold mb-1">Module Cards</h4>
      <p class="text-muted mb-0">Manage module cards displayed on various pages.</p>
    </div>
    <a href="{{ url('/admin/module-cards/create') }}" class="btn btn-primary"><i class="ri ri-add-line"></i> Add Card</a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table table-hover mb-0 align-middle">
        <thead class="table-light">
          <tr>
            <th>Card Title</th>
            <th>Icon</th>
            <th>Module Link</th>
            <th>Order</th>
            <th class="text-end">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($cards as $card)
          <tr>
            <td>{{ $card->card_title }}</td>
            <td><i class="{{ $card->icon_class }}"></i></td>
            <td><code>{{ $card->module_link ?? '-' }}</code></td>
            <td>{{ $card->sort_order }}</td>
            <td class="text-end">
              <a href="{{ url('/admin/module-cards/' . $card->id . '/edit') }}" class="btn btn-sm btn-outline-primary">Edit</a>
              <form action="{{ url('/admin/module-cards/' . $card->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center text-muted">No cards found. <a href="{{ url('/admin/module-cards/create') }}">Create one</a></td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
