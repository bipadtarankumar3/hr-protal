<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    //
    public function apply($id=null) {
        return view('frontend.careers.apply');
    }
}
