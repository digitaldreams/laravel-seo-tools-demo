<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('pages.blog.frontend.index', [
            'records' => Post::where('status', Post::STATUS_ACTIVE)->paginate(6)
        ]);
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Request $request, Post $post)
    {
        return view('pages.blog.frontend.show', [
            'record' => $post
        ]);
    }
}
