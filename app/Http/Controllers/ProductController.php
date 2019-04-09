<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\User;
use App\Models\Category;
use App\Http\Requests\Products\Index;
use App\Http\Requests\Products\Show;
use App\Http\Requests\Products\Create;
use App\Http\Requests\Products\Store;
use App\Http\Requests\Products\Edit;
use App\Http\Requests\Products\Update;
use App\Http\Requests\Products\Destroy;


/**
 * Description of ProductController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Index $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.products.index', ['records' => Product::paginate(10)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Show $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Product $product)
    {
        return view('pages.products.show', [
            'record' => $product,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Create $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
        $categories = Category::all(['id']);

        return view('pages.products.create', [
            'model' => new Product,
            "categories" => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Store $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model = new Product;
        $model->fill($request->all());

        if ($model->save()) {

            session()->flash('app_message', 'Product saved successfully');
            return redirect()->route('products.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Product');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Product $product)
    {
        $categories = Category::all(['id']);

        return view('pages.products.edit', [
            'model' => $product,
            "categories" => $categories,
        ]);
    }

    /**
     * Update a existing resource in storage.
     *
     * @param  Update $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Product $product)
    {
        $product->fill($request->all());

        if ($product->save()) {

            session()->flash('app_message', 'Product successfully updated');
            return redirect()->route('products.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Product');
        }
        return redirect()->back();
    }

    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy $request
     * @param  Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Product $product)
    {
        if ($product->delete()) {
            session()->flash('app_message', 'Product successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Product');
        }
        return redirect()->back();
    }
}
