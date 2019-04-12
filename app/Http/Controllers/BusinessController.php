<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Services\HereGeocoding;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\User;
use App\Http\Requests\Businesses\Index;
use App\Http\Requests\Businesses\Show;
use App\Http\Requests\Businesses\Create;
use App\Http\Requests\Businesses\Store;
use App\Http\Requests\Businesses\Edit;
use App\Http\Requests\Businesses\Update;
use App\Http\Requests\Businesses\Destroy;
use App\Services\PhotoService;
use App\Models\Photo;

/**
 * Description of BusinessController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */
class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Index $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.businesses.index', ['records' => Business::paginate(6)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Show $request
     * @param  Business $business
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Business $business)
    {
        return view('pages.businesses.show', [
            'record' => $business,
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
        return view('pages.businesses.create', [
            'model' => new Business
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Store $request
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function store(Store $request)
    {
        $model = new Business;
        $model->fill($request->all());
        $model->logo_id = (new PhotoService(new Photo()))->save($request, 'logo')->id;
        $hereGeocoding = new HereGeocoding($request->get('address'));
        $data = $hereGeocoding->fetch()->toArray();
        $location = new Location();
        $location->fill($data);
        $location->save();
        $model->address_id = $location->id;

        if ($model->save()) {

            session()->flash('app_message', 'Business saved successfully');
            return redirect()->route('businesses.index');
        } else {
            session()->flash('app_message', 'Something is wrong while saving Business');
        }
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit $request
     * @param  Business $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Business $business)
    {
        return view('pages.businesses.edit', [
            'model' => $business,
        ]);
    }

    /**
     * Update a existing resource in storage.
     *
     * @param  Update $request
     * @param  Business $business
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Business $business)
    {
        $business->fill($request->all());

        if ($business->save()) {

            session()->flash('app_message', 'Business successfully updated');
            return redirect()->route('businesses.index');
        } else {
            session()->flash('app_error', 'Something is wrong while updating Business');
        }
        return redirect()->back();
    }

    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy $request
     * @param  Business $business
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Business $business)
    {
        if ($business->delete()) {
            session()->flash('app_message', 'Business successfully deleted');
        } else {
            session()->flash('app_error', 'Error occurred while deleting Business');
        }

        return redirect()->back();
    }
}
