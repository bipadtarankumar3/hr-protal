<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kyc;
use Illuminate\Http\Request;

class KycController extends Controller
{
    public function index(Request $request)
    {
        $query = Kyc::query();

        // Search filter
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('user_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Sorting
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $query->orderBy($sortBy, $sortOrder);

        // Pagination
        $kycs = $query->paginate(15)->appends($request->query());
        return view('admin.kyc.index', compact('kycs'));
    }

    public function create()
    {
        return view('admin.kyc.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'aadhar_number' => 'required|string|max:20|unique:kycs,aadhar_number',
            'pan_number' => 'required|string|max:20|unique:kycs,pan_number',
            'bank_account' => 'nullable|string|max:50',
            'ifsc_code' => 'nullable|string|max:15',
            'verification_status' => 'required|in:pending,verified,rejected',
            'verified_by' => 'nullable|integer|exists:users,id',
        ]);

        $validated['is_active'] = true;
        Kyc::create($validated);

        return redirect('admin/kyc')->with('success', 'KYC entry created successfully.');
    }

    public function edit($id)
    {
        $kyc = Kyc::findOrFail($id);
        return view('admin.kyc.edit', compact('kyc'));
    }

    public function update(Request $request, $id)
    {
        $kyc = Kyc::findOrFail($id);
        $validated = $request->validate([
            'employee_id' => 'required|integer|exists:users,id',
            'aadhar_number' => 'required|string|max:20|unique:kycs,aadhar_number,' . $id,
            'pan_number' => 'required|string|max:20|unique:kycs,pan_number,' . $id,
            'bank_account' => 'nullable|string|max:50',
            'ifsc_code' => 'nullable|string|max:15',
            'verification_status' => 'required|in:pending,verified,rejected',
            'verified_by' => 'nullable|integer|exists:users,id',
        ]);

        $kyc->update($validated);

        return redirect('admin/kyc')->with('success', 'KYC entry updated successfully.');
    }

    public function show($id)
    {
        $kyc = Kyc::findOrFail($id);
        return view('admin.kyc.show', compact('kyc'));
    }

    public function destroy($id)
    {
        $kyc = Kyc::findOrFail($id);
        $kyc->delete();

        return redirect('admin/kyc')->with('success', 'KYC entry deleted successfully.');
    }
}
