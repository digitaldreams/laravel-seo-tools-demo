<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('pages.products.frontend.index', [
            'records' => Product::where('status', Product::STATUS_ACTIVE)->paginate(6)
        ]);
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Product $product)
    {
        return view('pages.products.frontend.show', [
            'record' => $product
        ]);
    }
}
