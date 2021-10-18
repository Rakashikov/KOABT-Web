<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rehearsal;
use App\Models\TypesOfRehearsal;
use App\Models\Troupe;
use App\Models\Cast;
use App\Http\Requests\Rehearsals\Index;
use App\Http\Requests\Rehearsals\Show;
use App\Http\Requests\Rehearsals\Create;
use App\Http\Requests\Rehearsals\Store;
use App\Http\Requests\Rehearsals\Edit;
use App\Http\Requests\Rehearsals\Update;
use App\Http\Requests\Rehearsals\Destroy;


/**
 * Description of RehearsalController
 *
 * @author Tuhin Bepari <digitaldreams40@gmail.com>
 */

class RehearsalController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @param  Index  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        return view('pages.rehearsals.index', ['records' => Rehearsal::paginate(10)]);
    }    /**
     * Display the specified resource.
     *
     * @param  Show  $request
     * @param  Rehearsal  $rehearsal
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request, Rehearsal $rehearsal)
    {
        return view('pages.rehearsals.show', [
                'record' =>$rehearsal,
        ]);

    }    /**
     * Show the form for creating a new resource.
     *
     * @param  Create  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
		$types_of_rehearsals = TypesOfRehearsal::all(['id']);
		$troupes = Troupe::all(['id']);
		$casts = Cast::all(['id']);

        return view('pages.rehearsals.create', [
            'model' => new Rehearsal,
			"types_of_rehearsals" => $types_of_rehearsals,
			"troupes" => $troupes,
			"casts" => $casts,

        ]);
    }    /**
     * Store a newly created resource in storage.
     *
     * @param  Store  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $model=new Rehearsal;
        $model->fill($request->all());

        if ($model->save()) {
            
            session()->flash('app_message', 'Rehearsal saved successfully');
            return redirect()->route('rehearsals.index');
            } else {
                session()->flash('app_message', 'Something is wrong while saving Rehearsal');
            }
        return redirect()->back();
    } /**
     * Show the form for editing the specified resource.
     *
     * @param  Edit  $request
     * @param  Rehearsal  $rehearsal
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, Rehearsal $rehearsal)
    {
		$types_of_rehearsals = TypesOfRehearsal::all(['id']);
		$troupes = Troupe::all(['id']);
		$casts = Cast::all(['id']);

        return view('pages.rehearsals.edit', [
            'model' => $rehearsal,
			"types_of_rehearsals" => $types_of_rehearsals,
			"troupes" => $troupes,
			"casts" => $casts,

            ]);
    }    /**
     * Update a existing resource in storage.
     *
     * @param  Update  $request
     * @param  Rehearsal  $rehearsal
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request,Rehearsal $rehearsal)
    {
        $rehearsal->fill($request->all());

        if ($rehearsal->save()) {
            
            session()->flash('app_message', 'Rehearsal successfully updated');
            return redirect()->route('rehearsals.index');
            } else {
                session()->flash('app_error', 'Something is wrong while updating Rehearsal');
            }
        return redirect()->back();
    }    /**
     * Delete a  resource from  storage.
     *
     * @param  Destroy  $request
     * @param  Rehearsal  $rehearsal
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Destroy $request, Rehearsal $rehearsal)
    {
        if ($rehearsal->delete()) {
                session()->flash('app_message', 'Rehearsal successfully deleted');
            } else {
                session()->flash('app_error', 'Error occurred while deleting Rehearsal');
            }

        return redirect()->back();
    }
}
