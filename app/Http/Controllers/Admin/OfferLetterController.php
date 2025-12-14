<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class OfferLetterController extends Controller
{
    public function index()
    {
        return view('admin.offer-letters.index');
    }

    public function show($id)
    {
        return view('admin.offer-letters.show', ['id' => $id]);
    }

    public function compose()
    {
        return view('admin.offer-letters.compose');
    }
}
