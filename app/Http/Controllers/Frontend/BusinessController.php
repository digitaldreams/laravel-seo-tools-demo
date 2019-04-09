<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Business;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('pages.businesses.frontend.index', [
            'records' => Business::where('status', Business::STATUS_ACTIVE)->paginate(6)
        ]);
    }

    /**
     * @param Request $request
     * @param Business $business
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Business $business)
    {
        return view('pages.businesses.frontend.show', [
            'record' => $business
        ]);
    }
}
