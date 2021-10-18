<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdministrativePosition;
use App\Http\Requests\AdministrativePositions\Index;
use App\Http\Requests\AdministrativePositions\Show;
use App\Http\Requests\AdministrativePositions\Create;
use App\Http\Requests\AdministrativePositions\Store;
use App\Http\Requests\AdministrativePositions\Edit;
use App\Http\Requests\AdministrativePositions\Update;
use App\Http\Requests\AdministrativePositions\Destroy;


/**
 * Description of AdministrativePositionController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class AdministrativePositionController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.administrative_positions.index', ['records' => AdministrativePosition::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  AdministrativePosition  $administrativeposition
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, AdministrativePosition $administrativeposition)
    {
        return view('pages.administrative_positions.show', [
                'record' =>$administrativeposition,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.administrative_positions.create', [
            'model' => new AdministrativePosition,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new AdministrativePosition;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'AdministrativePosition saved successfully');
            return redirect()->route('administrative_positions.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving AdministrativePosition');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  AdministrativePosition  $administrativeposition
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, AdministrativePosition $administrativeposition)
    {

        return view('pages.administrative_positions.edit', [
            'model' => $administrativeposition,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  AdministrativePosition  $administrativeposition
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,AdministrativePosition $administrativeposition)
    {
        $administrativeposition->fill($request->all());

        if ($administrativeposition->save()) {
            
            session()->flash('app_message', 'AdministrativePosition successfully updated');
            return redirect()->route('administrative_positions.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating AdministrativePosition');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  AdministrativePosition  $administrativeposition
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, AdministrativePosition $administrativeposition)
    {
        if ($administrativeposition->delete()) {
                session()->flash('app_message', 'AdministrativePosition successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting AdministrativePosition');
            }

        return redirect()->back();
    }
}
