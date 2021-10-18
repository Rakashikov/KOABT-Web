<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EventCategory;
use App\Http\Requests\EventCategory\Index;
use App\Http\Requests\EventCategory\Show;
use App\Http\Requests\EventCategory\Create;
use App\Http\Requests\EventCategory\Store;
use App\Http\Requests\EventCategory\Edit;
use App\Http\Requests\EventCategory\Update;
use App\Http\Requests\EventCategory\Destroy;


/**
 * Description of EventCategoryController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class EventCategoryController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.event_category.index', ['records' => EventCategory::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  EventCategory  $eventcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, EventCategory $eventcategory)
    {
        return view('pages.event_category.show', [
                'record' =>$eventcategory,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.event_category.create', [
            'model' => new EventCategory,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new EventCategory;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'EventCategory saved successfully');
            return redirect()->route('event_category.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving EventCategory');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  EventCategory  $eventcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, EventCategory $eventcategory)
    {

        return view('pages.event_category.edit', [
            'model' => $eventcategory,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  EventCategory  $eventcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,EventCategory $eventcategory)
    {
        $eventcategory->fill($request->all());

        if ($eventcategory->save()) {
            
            session()->flash('app_message', 'EventCategory successfully updated');
            return redirect()->route('event_category.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating EventCategory');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  EventCategory  $eventcategory
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, EventCategory $eventcategory)
    {
        if ($eventcategory->delete()) {
                session()->flash('app_message', 'EventCategory successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting EventCategory');
            }

        return redirect()->back();
    }
}
