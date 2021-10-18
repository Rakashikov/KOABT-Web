<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ActorsChangeInformation;
use App\Http\Requests\ActorsChangeInformation\Index;
use App\Http\Requests\ActorsChangeInformation\Show;
use App\Http\Requests\ActorsChangeInformation\Create;
use App\Http\Requests\ActorsChangeInformation\Store;
use App\Http\Requests\ActorsChangeInformation\Edit;
use App\Http\Requests\ActorsChangeInformation\Update;
use App\Http\Requests\ActorsChangeInformation\Destroy;


/**
 * Description of ActorsChangeInformationController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class ActorsChangeInformationController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.actors_change_information.index', ['records' => ActorsChangeInformation::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  ActorsChangeInformation  $actorschangeinformation
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, ActorsChangeInformation $actorschangeinformation)
    {
        return view('pages.actors_change_information.show', [
                'record' =>$actorschangeinformation,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {

        return view('pages.actors_change_information.create', [
            'model' => new ActorsChangeInformation,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new ActorsChangeInformation;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'ActorsChangeInformation saved successfully');
            return redirect()->route('actors_change_information.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving ActorsChangeInformation');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  ActorsChangeInformation  $actorschangeinformation
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, ActorsChangeInformation $actorschangeinformation)
    {

        return view('pages.actors_change_information.edit', [
            'model' => $actorschangeinformation,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  ActorsChangeInformation  $actorschangeinformation
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,ActorsChangeInformation $actorschangeinformation)
    {
        $actorschangeinformation->fill($request->all());

        if ($actorschangeinformation->save()) {
            
            session()->flash('app_message', 'ActorsChangeInformation successfully updated');
            return redirect()->route('actors_change_information.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating ActorsChangeInformation');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  ActorsChangeInformation  $actorschangeinformation
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, ActorsChangeInformation $actorschangeinformation)
    {
        if ($actorschangeinformation->delete()) {
                session()->flash('app_message', 'ActorsChangeInformation successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting ActorsChangeInformation');
            }

        return redirect()->back();
    }
}
