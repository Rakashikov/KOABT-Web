<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActorRole;
use App\Models\Role;
use App\Models\Actor;
use App\Http\Requests\ActorRoles\Index;
use App\Http\Requests\ActorRoles\Show;
use App\Http\Requests\ActorRoles\Create;
use App\Http\Requests\ActorRoles\Store;
use App\Http\Requests\ActorRoles\Edit;
use App\Http\Requests\ActorRoles\Update;
use App\Http\Requests\ActorRoles\Destroy;


/**
 * Description of ActorRoleController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ActorRoleController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.actor_roles.index', ['records' => ActorRole::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  ActorRole  $actorrole
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, ActorRole $actorrole)
    {
        return view('pages.actor_roles.show', [
                'record' =>$actorrole,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
		$roles = Role::all(['id']);
		$actors = Actor::all(['id']);

        return view('pages.actor_roles.create', [
            'model' => new ActorRole,
			"roles" => $roles,
			"actors" => $actors,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new ActorRole;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ActorRole saved successfully');
            return redirect()->route('actor_roles.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ActorRole');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  ActorRole  $actorrole
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, ActorRole $actorrole)
    {
		$roles = Role::all(['id']);
		$actors = Actor::all(['id']);

        return view('pages.actor_roles.edit', [
            'model' => $actorrole,
			"roles" => $roles,
			"actors" => $actors,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  ActorRole  $actorrole
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,ActorRole $actorrole)
    {
        $actorrole->fill($request->all());

        if ($actorrole->save()) {
            
            session()->flash('app_message', 'ActorRole successfully updated');
            return redirect()->route('actor_roles.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ActorRole');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  ActorRole  $actorrole
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, ActorRole $actorrole)
    {
        if ($actorrole->delete()) {
                session()->flash('app_message', 'ActorRole successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ActorRole');
            }

        return redirect()->back();
    }
}
