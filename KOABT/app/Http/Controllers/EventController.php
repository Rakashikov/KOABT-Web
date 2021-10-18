<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use App\Http\Requests\Events\Index;
use App\Http\Requests\Events\Show;
use App\Http\Requests\Events\Create;
use App\Http\Requests\Events\Store;
use App\Http\Requests\Events\Edit;
use App\Http\Requests\Events\Update;
use App\Http\Requests\Events\Destroy;


/**
 * Description of EventController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class EventController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.events.index', ['records' => Event::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Event $event)
    {
        return view('pages.events.show', [
                'record' =>$event,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
		$event_category = EventCategory::all(['id']);

        return view('pages.events.create', [
            'model' => new Event,
			"event_category" => $event_category,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Event;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Event saved successfully');
            return redirect()->route('events.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Event');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Event $event)
    {
		$event_category = EventCategory::all(['id']);

        return view('pages.events.edit', [
            'model' => $event,
			"event_category" => $event_category,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Event $event)
    {
        $event->fill($request->all());

        if ($event->save()) {
            
            session()->flash('app_message', 'Event successfully updated');
            return redirect()->route('events.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Event');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Event  $event
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Event $event)
    {
        if ($event->delete()) {
                session()->flash('app_message', 'Event successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Event');
            }

        return redirect()->back();
    }
}
