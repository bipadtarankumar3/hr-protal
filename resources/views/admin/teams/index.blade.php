@extends('admin.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card shadow-sm rounded-4">
    <div class="card-body">
      <h4 class="mb-3"><i class="ri ri-stack-line me-2"></i>Teams</h4>
      <p class="text-muted">Quick access to team pages: Tech, Ops, HR, BPO, Marketing, Finance.</p>

      <div class="d-flex flex-wrap gap-3 mt-4">
        <a href="{{ url('/admin/teams/tech') }}" class="btn btn-outline-primary">Tech Team</a>
        <a href="{{ url('/admin/teams/ops') }}" class="btn btn-outline-primary">Ops Team</a>
        <a href="{{ url('/admin/teams/hr') }}" class="btn btn-outline-primary">HR Team</a>
        <a href="{{ url('/admin/teams/bpo') }}" class="btn btn-outline-primary">BPO Cell</a>
        <a href="{{ url('/admin/teams/marketing') }}" class="btn btn-outline-primary">Marketing</a>
        <a href="{{ url('/admin/teams/finance') }}" class="btn btn-outline-primary">Finance</a>
      </div>

    </div>
  </div>
</div>
@endsection
