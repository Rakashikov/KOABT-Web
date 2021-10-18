<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Troupe;
use App\Models\Position;
use App\Http\Requests\Actors\Index;
use App\Http\Requests\Actors\Show;
use App\Http\Requests\Actors\Create;
use App\Http\Requests\Actors\Store;
use App\Http\Requests\Actors\Edit;
use App\Http\Requests\Actors\Update;
use App\Http\Requests\Actors\Destroy;


/**
 * Description of ActorController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ActorController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.actors.index', ['records' => Actor::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Actor $actor)
    {
        return view('pages.actors.show', [
                'record' =>$actor,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
		$troupes = Troupe::all(['id']);
		$positions = Position::all(['id']);

        return view('pages.actors.create', [
            'model' => new Actor,
			"troupes" => $troupes,
			"positions" => $positions,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Actor;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Actor saved successfully');
            return redirect()->route('actors.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Actor');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Actor $actor)
    {
		$troupes = Troupe::all(['id']);
		$positions = Position::all(['id']);

        return view('pages.actors.edit', [
            'model' => $actor,
			"troupes" => $troupes,
			"positions" => $positions,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Actor $actor)
    {
        $actor->fill($request->all());

        if ($actor->save()) {
            
            session()->flash('app_message', 'Actor successfully updated');
            return redirect()->route('actors.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Actor');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Actor  $actor
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Actor $actor)
    {
        if ($actor->delete()) {
                session()->flash('app_message', 'Actor successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Actor');
            }

        return redirect()->back();
    }
}
