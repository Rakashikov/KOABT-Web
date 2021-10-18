<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administration;
use App\Models\AdministrativePosition;
use App\Http\Requests\Administrations\Index;
use App\Http\Requests\Administrations\Show;
use App\Http\Requests\Administrations\Create;
use App\Http\Requests\Administrations\Store;
use App\Http\Requests\Administrations\Edit;
use App\Http\Requests\Administrations\Update;
use App\Http\Requests\Administrations\Destroy;


/**
 * Description of AdministrationController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AdministrationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.administrations.index', ['records' => Administration::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Administration $administration)
    {
        return view('pages.administrations.show', [
                'record' =>$administration,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
		$administrative_positions = AdministrativePosition::all(['id']);

        return view('pages.administrations.create', [
            'model' => new Administration,
			"administrative_positions" => $administrative_positions,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Administration;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Administration saved successfully');
            return redirect()->route('administrations.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Administration');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Administration $administration)
    {
		$administrative_positions = AdministrativePosition::all(['id']);

        return view('pages.administrations.edit', [
            'model' => $administration,
			"administrative_positions" => $administrative_positions,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Administration  $administration
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Administration $administration)
    {
        $administration->fill($request->all());

        if ($administration->save()) {
            
            session()->flash('app_message', 'Administration successfully updated');
            return redirect()->route('administrations.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Administration');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Administration  $administration
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Administration $administration)
    {
        if ($administration->delete()) {
                session()->flash('app_message', 'Administration successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Administration');
            }

        return redirect()->back();
    }
}
