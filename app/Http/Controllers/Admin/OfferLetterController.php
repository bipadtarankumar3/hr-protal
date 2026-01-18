<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfferLetter;
use Illuminate\Http\Request;

class OfferLetterController extends Controller
{
    public function index(Request $request)
    {
        $query = OfferLetter::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('employee_name', 'like', "%$search%")->orWhere('position', 'like', "%$search%");
            });
        }
        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }
        $sortBy = $request->input('sort_by', 'created_at');
        $sortOrder = $request->input('sort_order', 'desc');
        $offer_letters = $query->orderBy($sortBy, $sortOrder)->paginate(15)->appends($request->query());
        return view('admin.offer-letters.index', compact('offer_letters'));
    }

    public function create()
    {
        return view('admin.offer-letters.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'candidate_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'joining_date' => 'required|date',
            'letter_date' => 'required|date',
            'status' => 'required|in:draft,sent,accepted,rejected',
            'terms_conditions' => 'nullable|string',
        ]);

        $validated['is_active'] = true;
        OfferLetter::create($validated);

        return redirect('admin/offer-letters')->with('success', 'Offer letter created successfully.');
    }

    public function edit($id)
    {
        $offer_letter = OfferLetter::findOrFail($id);
        return view('admin.offer-letters.edit', compact('offer_letter'));
    }

    public function update(Request $request, $id)
    {
        $offer_letter = OfferLetter::findOrFail($id);
        $validated = $request->validate([
            'candidate_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'salary' => 'required|numeric|min:0',
            'joining_date' => 'required|date',
            'letter_date' => 'required|date',
            'status' => 'required|in:draft,sent,accepted,rejected',
            'terms_conditions' => 'nullable|string',
        ]);

        $offer_letter->update($validated);

        return redirect('admin/offer-letters')->with('success', 'Offer letter updated successfully.');
    }

    public function show($id)
    {
        $offer_letter = OfferLetter::findOrFail($id);
        return view('admin.offer-letters.show', compact('offer_letter'));
    }

    public function compose()
    {
        return view('admin.offer-letters.compose');
    }

    public function destroy($id)
    {
        $offer_letter = OfferLetter::findOrFail($id);
        $offer_letter->delete();

        return redirect('admin/offer-letters')->with('success', 'Offer letter deleted successfully.');
    }
}
