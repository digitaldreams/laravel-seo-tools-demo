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
        $posts = Post::where('status', Post::STATUS_ACTIVE)->paginate(6);
        return view('pages.blog.index', [
            'firstPost' => $posts->shift(),
            'records' => $posts
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
