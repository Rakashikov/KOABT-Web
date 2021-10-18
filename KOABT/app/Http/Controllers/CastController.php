<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cast;
use App\Models\Event;
use App\Models\ActorRole;
use App\Http\Requests\Casts\Index;
use App\Http\Requests\Casts\Show;
use App\Http\Requests\Casts\Create;
use App\Http\Requests\Casts\Store;
use App\Http\Requests\Casts\Edit;
use App\Http\Requests\Casts\Update;
use App\Http\Requests\Casts\Destroy;


/**
 * Description of CastController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class CastController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.casts.index', ['records' => Cast::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Cast $cast)
    {
        return view('pages.casts.show', [
                'record' =>$cast,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
		$events = Event::all(['id']);
		$actor_roles = ActorRole::all(['id']);

        return view('pages.casts.create', [
            'model' => new Cast,
			"events" => $events,
			"actor_roles" => $actor_roles,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Cast;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Cast saved successfully');
            return redirect()->route('casts.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Cast');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Cast $cast)
    {
		$events = Event::all(['id']);
		$actor_roles = ActorRole::all(['id']);

        return view('pages.casts.edit', [
            'model' => $cast,
			"events" => $events,
			"actor_roles" => $actor_roles,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Cast  $cast
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Cast $cast)
    {
        $cast->fill($request->all());

        if ($cast->save()) {
            
            session()->flash('app_message', 'Cast successfully updated');
            return redirect()->route('casts.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Cast');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Cast  $cast
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Cast $cast)
    {
        if ($cast->delete()) {
                session()->flash('app_message', 'Cast successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Cast');
            }

        return redirect()->back();
    }
}
