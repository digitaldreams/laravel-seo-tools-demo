<?php

namespace App\Http\Controllers;

use App\Services\PhotoService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\User;
use App\Models\Category;
use App\Models\Photo;
use App\Http\Requests\Posts\Index;
use App\Http\Requests\Posts\Show;
use App\Http\Requests\Posts\Create;
use App\Http\Requests\Posts\Store;
use App\Http\Requests\Posts\Edit;
use App\Http\Requests\Posts\Update;
use App\Http\Requests\Posts\Destroy;
use SEO\Seo;

/**
 * Description of PostController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Index $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.posts.index', ['records' => Post::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param Show $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Post $post)
    {
        return view('pages.posts.show', [
            'record' => $post,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Create $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
        return view('pages.posts.create', [
            'model' => new Post,
            'categories' => Category::whereNull('parent_id')->select(['id', 'title'])->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Store $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Store $request)
    {
        $model = new Post;
        $model->fill($request->all());

        $model->photo_id = (new PhotoService(new Photo()))->save($request, 'photo')->id;
        if ($model->save()) {
            Seo::save($model, route('posts.show', $model->slug), [
                'title' => $model->title,
                'images' => [
                    $model->photo->getThumbnail()
                ]
            ]);
            session()->flash('app_message', 'Post saved successfully');
            return redirect()->route('posts.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Post');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Edit $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Post $post)
    {
        return view('pages.posts.edit', [
            'model' => $post,
            'categories' => Category::whereNull('parent_id')->select(['id', 'title'])->get()
        ]);
    }

    /**
     * Update a existing resource in storage.
     *
     * @param Update $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Post $post)
    {
        $post->fill($request->all());

        if ($post->save()) {
            Seo::save($post, route('posts.show', $post->slug), [
                'title' => $post->title,
                'images' => [
                    $post->photo->getThumbnail()
                ]
            ]);
            session()->flash('app_message', 'Post successfully updated');
            return redirect()->route('posts.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Post');
        }
        return redirect()->back();
    }

    /**
     * Delete a  resource from  storage.
     *
     * @param Destroy $request
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Post $post)
    {
        if ($post->delete()) {
            session()->flash('app_message', 'Post successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Post');
        }

        return redirect()->back();
    }
}
