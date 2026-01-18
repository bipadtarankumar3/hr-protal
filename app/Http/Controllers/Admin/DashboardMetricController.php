<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DashboardMetric;
use Illuminate\Http\Request;

class DashboardMetricController extends Controller
{
    public function index()
    {
        $metrics = DashboardMetric::where('is_active', true)
            ->orderBy('sort_order')
            ->get();
        return view('admin.dashboard-metrics.index', compact('metrics'));
    }

    public function create()
    {
        return view('admin.dashboard-metrics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'metric_key' => 'required|string|unique:dashboard_metrics',
            'metric_label' => 'required|string',
            'icon_class' => 'nullable|string',
            'badge_class' => 'required|string',
            'metric_value' => 'required|integer',
            'reference_module' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        DashboardMetric::create($validated);
        return redirect('/admin/dashboard-metrics')->with('success', 'Metric created successfully');
    }

    public function edit(DashboardMetric $metric)
    {
        return view('admin.dashboard-metrics.edit', compact('metric'));
    }

    public function update(Request $request, DashboardMetric $metric)
    {
        $validated = $request->validate([
            'metric_key' => 'required|string|unique:dashboard_metrics,metric_key,' . $metric->id,
            'metric_label' => 'required|string',
            'icon_class' => 'nullable|string',
            'badge_class' => 'required|string',
            'metric_value' => 'required|integer',
            'reference_module' => 'nullable|string',
            'sort_order' => 'required|integer',
        ]);

        $metric->update($validated);
        return redirect('/admin/dashboard-metrics')->with('success', 'Metric updated successfully');
    }

    public function destroy(DashboardMetric $metric)
    {
        $metric->delete();
        return redirect('/admin/dashboard-metrics')->with('success', 'Metric deleted successfully');
    }
}
