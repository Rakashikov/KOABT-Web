<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SpectaclesRole;
use App\Models\Event;
use App\Models\Role;
use App\Http\Requests\SpectaclesRoles\Index;
use App\Http\Requests\SpectaclesRoles\Show;
use App\Http\Requests\SpectaclesRoles\Create;
use App\Http\Requests\SpectaclesRoles\Store;
use App\Http\Requests\SpectaclesRoles\Edit;
use App\Http\Requests\SpectaclesRoles\Update;
use App\Http\Requests\SpectaclesRoles\Destroy;


/**
 * Description of SpectaclesRoleController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class SpectaclesRoleController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.spectacles_roles.index', ['records' => SpectaclesRole::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  SpectaclesRole  $spectaclesrole
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, SpectaclesRole $spectaclesrole)
    {
        return view('pages.spectacles_roles.show', [
                'record' =>$spectaclesrole,
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
		$roles = Role::all(['id']);

        return view('pages.spectacles_roles.create', [
            'model' => new SpectaclesRole,
			"events" => $events,
			"roles" => $roles,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new SpectaclesRole;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'SpectaclesRole saved successfully');
            return redirect()->route('spectacles_roles.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving SpectaclesRole');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  SpectaclesRole  $spectaclesrole
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, SpectaclesRole $spectaclesrole)
    {
		$events = Event::all(['id']);
		$roles = Role::all(['id']);

        return view('pages.spectacles_roles.edit', [
            'model' => $spectaclesrole,
			"events" => $events,
			"roles" => $roles,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  SpectaclesRole  $spectaclesrole
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,SpectaclesRole $spectaclesrole)
    {
        $spectaclesrole->fill($request->all());

        if ($spectaclesrole->save()) {
            
            session()->flash('app_message', 'SpectaclesRole successfully updated');
            return redirect()->route('spectacles_roles.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating SpectaclesRole');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  SpectaclesRole  $spectaclesrole
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, SpectaclesRole $spectaclesrole)
    {
        if ($spectaclesrole->delete()) {
                session()->flash('app_message', 'SpectaclesRole successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting SpectaclesRole');
            }

        return redirect()->back();
    }
}
